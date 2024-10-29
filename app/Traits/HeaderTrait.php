<?php

namespace App\Traits;

trait HeaderTrait
{
    // Define el método Header para el encabezado en todas las páginas
    public function Header()
    {
          // Select Arial bold 15
          $this ->SetFont('Arial', 'B', 15);
          // Move to the right
          $this ->Cell(80);
          // Framed title
          // $pdf ->Cell(30, 10, 'Title', 1, 0, 'C');
          $this->Image('img\denuncia\Banner Fiscalía.png',0,8,220);
  
          // Line break
          $this ->Ln(20);// Espacio entre el encabezado y el contenido de la página
    }

    // Método Footer (opcional)
    public function Footer()
    {
        // Posiciona el pie de página a 1.5 cm del final
        $this->SetY(-10);
        
        // Define la fuente del pie de página
        $this->SetFont('Arial', 'I', 8);
        
        // Agrega el número de página
        $this->Cell(0, 10, utf8_decode('Página '.$this->PageNo().'/{nb}'), 0, 0, 'C');
    }
    var $B=0;
    var $I=0;
    var $U=0;
    var $HREF='';
    var $ALIGN='J';
    function WriteHTML($html)
    {
        //HTML parser
        $html=str_replace("\n",' ',$html);
        $a=preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
        foreach($a as $i=>$e)
        {
            if($i%2==0)
            {
                //Text
                if($this->HREF)
                    $this->PutLink($this->HREF,$e);
                elseif($this->ALIGN=='center')
                    $this->Cell(0,4,$e,0,1,'C');
                else
                    $this->Write(4,$e);
                    // $this->MultiCell(190,4,$e,0,'J');
            }
            else
            {
                //Tag
                if($e[0]=='/')
                    $this->CloseTag(strtoupper(substr($e,1)));
                else
                {
                    //Extract properties
                    $a2=explode(' ',$e);
                    $tag=strtoupper(array_shift($a2));
                    $prop=array();
                    foreach($a2 as $v)
                    {
                        if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                            $prop[strtoupper($a3[1])]=$a3[2];
                    }
                    $this->OpenTag($tag,$prop);
                }
            }
        }
    }

    function OpenTag($tag,$prop)
    {
        //Opening tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,true);
        if($tag=='A')
            $this->HREF=$prop['HREF'];
        if($tag=='BR')
            $this->Ln(5);
        if($tag=='P')
            $this->ALIGN=$prop['ALIGN'];
        if($tag=='HR')
        {
            if( !empty($prop['WIDTH']) )
                $Width = $prop['WIDTH'];
            else
                $Width = $this->w - $this->lMargin-$this->rMargin;
            $this->Ln(2);
            $x = $this->GetX();
            $y = $this->GetY();
            $this->SetLineWidth(0.4);
            $this->Line($x,$y,$x+$Width,$y);
            $this->SetLineWidth(0.2);
            $this->Ln(2);
        }
    }

    function CloseTag($tag)
    {
        //Closing tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,false);
        if($tag=='A')
            $this->HREF='';
        if($tag=='P')
            $this->ALIGN='';
    }

    function SetStyle($tag,$enable)
    {
        //Modify style and select corresponding font
        $this->$tag+=($enable ? 1 : -1);
        $style='';
        foreach(array('B','I','U') as $s)
            if($this->$s>0)
                $style.=$s;
        $this->SetFont('',$style);
    }

    function PutLink($URL,$txt)
    {
        //Put a hyperlink
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->SetTextColor(0);
    }
}
