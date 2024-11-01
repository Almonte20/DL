<style media="screen">
  .table-fge,
  .table-fge > th,
  .table-fge > td {
    background-color: #152f4a;
    color: white;
  }
  body,
html {
 
  background: #f1f1f1;
  font-family: "Poppins", sans-serif;
}
.tabsWizard.design-1 .nav-pills li.filled.active a,
.tabsWizard.design-1 .nav-pills li.add.active a {
  cursor: default;
  color: #ffffff;
  background-color: #152f4a;
  border-radius: 6px;
}
.tabsWizard.design-1 .nav-pills li.filled.active a .badge,
.tabsWizard.design-1 .nav-pills li.add.active a .badge {
  color: #152f4a;
  font-size: 1em;
}
.tabsWizard.design-1 .nav-pills li.filled:not(.active) a,
.tabsWizard.design-1 .nav-pills li.add:not(.active) a {
  cursor: pointer;
  color: #152f4a;
  border-radius: 6px;
}
.tabsWizard.design-1 .nav-pills li.filled:not(.active) a:hover,
.tabsWizard.design-1 .nav-pills li.add:not(.active) a:hover {
  background: #ffffff;
}
.tabsWizard.design-1 .nav-pills li.filled:not(.active) .badge,
.tabsWizard.design-1 .nav-pills li.add:not(.active) .badge {
  color: #ffffff;
  font-size: 1em;
  background-color: #152f4a;
}
.tabsWizard.design-1 .btn-primary {
  border-radius: 6px !important;
  color: #152f4a;
  background: #ffffff;
  border: 1px solid #152f4a;
  padding: 10px 40px;
  text-transform: uppercase;
  transition: all 0.3s ease 0s;
}
.tabsWizard.design-1 .btn-primary:hover,
.tabsWizard.design-1 .btn-primary:active {
  background: #152f4a;
  border-color: #ffffff;
  color: #ffffff;
  transform: translateY(-3px);
}
.tabsWizard.design-1 .btn-primary.inverse {
  color: #ffffff;
  background: #152f4a;
}
.tabsWizard.design-1 .btn-primary.inverse:hover,
.tabsWizard.design-1 .btn-primary.inverse:active {
  color: #ffffff;
  background: #152f4a;
}

.text-blue{
  color: #152f4a;
}

  </style>
  @extends('layouts.version2.modulos')
  
  @section('titulo','Consulta De Denuncia')

@section('contenido')

<div class="container mt-5">
	<div class="row">
		<div class="col-md-12 col-sm-push-2">
			<h1></h1>
			<div id="tabsWizard" class="tabsWizard design-1">
				<!-- Navigation tabs -->
				<ul class="nav nav-pills active" role="tablist">
					<li role="presentation" class="filled active add">
						<a href="#step-1" class="btn btn-light font-weight-bold" aria-controls="step-1" role="tab" data-toggle="tab"> 
							<span class="tabs-text">Denunciante</span>
						</a>
					</li>
          @if ($victimaDenunciante == 0)
					<li role="presentation" class="filled">
						<a href="#step-2" class="btn btn-light font-weight-bold" aria-controls="step-2" role="tab" data-toggle="tab">
							<span class="tabs-text">Víctima</span>
						</a>
					</li>
          @endif
					<li role="presentation" class="filled">
						<a href="#step-3" class="btn btn-light font-weight-bold" aria-controls="step-3" role="tab" data-toggle="tab"> 
						
							<span class="tabs-text" for="#step-3">Hechos</span>
						</a>
					</li>
					<li role="presentation" class="filled">
						<a href="#step-4" class="btn btn-light font-weight-bold" aria-controls="step-4" role="tab" data-toggle="tab"> 
				
							<span class="tabs-text">Testigos</span>
						</a>
					</li>	
          <li role="presentation" class="filled">
						<a href="#step-5" class="btn btn-light font-weight-bold" aria-controls="step-4" role="tab" data-toggle="tab"> 
				
							<span class="tabs-text">Evidencias</span>
						</a>
					</li>
				</ul>
				<hr>
				<!-- Tab content -->
				<div class="tab-content">
					<div id="step-1" class="tab-pane active" role="tabpanel">
						{{-- <h3 class="h3">STEP 1 - What is Lorem Ipsum?</h3> --}}
						@include("consultaDenuncia.DatosDenunciante")
					</div>
					<div id="step-2" class="tab-pane" role="tabpanel">
						<h3>STEP 2 - Why do we use it?</h3>
						It is a long established fact that a reader will be distracted by the readable content of a page when looking at its 
					</div>
					<div id="step-3" class="tab-pane " role="tabpanel">
						<h3>STEP3 - Where does it come from?</h3>
						Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature 
					</div>
					<div id="step-4" class="tab-pane" role="tabpanel">
						<h3>THANK YOU</h3>
						Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature 
					</div>
          <div id="step-5" class="tab-pane" role="tabpanel">
						<h3>THANK YOU</h3>
						Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature 
					</div>
				</div>
				<hr>
				<!-- Control buttons -->
				<div class="form-group form-navigation p-3">
					<p class="text-center">
						<a href="#" class="btn btn-primary font-weight-bold" id="prevbtn" style="display:none;">Atrás</a>
						<a href="#" class="btn btn-primary font-weight-bold" id="ntxbtn">Continuar</a>
					</p>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection

@section('js')

<script>
  (function ($) {
	$.fn.wizardPlugin = function (options) {
		// Default options
		var settings = $.extend(
			{
				language: "en",
				actionButtonClass: "inverse",
				showCloseButton: true,
				translations: {
					sk: {
						next: "Pokračovať",
						prev: "Späť",
						action: "Dokončiť",
						close: "Zavrieť",
						complete: "Sprievodca dokončený!",
						tabs: ["Krok 1", "Krok 2", "Krok 3"]
					},
					en: {
						next: "Continue",
						prev: "Back",
						action: "Finish",
						close: "Close",
						complete: "Wizard completed!",
						tabs: ["Step 1", "Step 2", "Step 3"]
					},
					es: {
						next: "Siguiente",
						prev: "Atrás",
						action: "Aceptar",
						complete: "Visualización completada",
            @if ($victimaDenunciante == 0)
						tabs: ["Denunciante", "Víctima", "Hechos","Testigos","Evidencias"]
            @else
						tabs: ["Denunciante", "Hechos","Testigos","Evidencias"]
            @endif
					}
				}
			},
			options
		);

		return this.each(function () {
			var $wizard = $(this);
			var $tabs = $wizard.find(".nav-pills li a");
			var $nextBtn = $wizard.find("#ntxbtn");
			var $prevBtn = $wizard.find("#prevbtn");
			var currentIndex = 0;

			// Function to load the current step from localStorage
			function loadStepFromStorage() {
				var storedIndex = localStorage.getItem("wizardCurrentStep");
				return storedIndex !== null ? parseInt(storedIndex, 10) : 0; // If nothing is stored, start at 0
			}

			// Function to save the current step to localStorage
			function saveStepToStorage(index) {
				localStorage.setItem("wizardCurrentStep", index);
			}

			function getTranslation(key) {
				return settings.translations[settings.language][key];
			}

			function updateTabs() {
				$tabs.each(function (index) {
					$(this).text(getTranslation("tabs")[index]);
				});
			}

			function updateButtons() {
				$prevBtn.text(getTranslation("prev"));
				if (currentIndex === 0) {
					$prevBtn.hide();
					$nextBtn.show().text(getTranslation("next"));
				} else if (currentIndex === $tabs.length - 2) {
					$prevBtn.show();
					$nextBtn
						.show()
						.text(getTranslation("next"))
						.removeClass(settings.actionButtonClass);
				} else if (currentIndex === $tabs.length - 1) {
          $prevBtn.show();
          $nextBtn.hide();
				} else {
					$prevBtn.show();
					$nextBtn
						.show()
						.text(getTranslation("next"))
						.removeClass(settings.actionButtonClass);
				}
			}

			function goToTab(index) {
				$wizard.find(".nav-pills li").removeClass("active");
				$wizard.find(".tab-pane").removeClass("active");

				$wizard.find(".nav-pills li").eq(index).addClass("active");
				$wizard.find(".tab-pane").eq(index).addClass("active");

				currentIndex = index;
				updateButtons();
				saveStepToStorage(index); // Save the current step to localStorage
			}

			updateTabs();

			// Load the saved step from localStorage and set it to that step
			var savedStep = loadStepFromStorage();
			goToTab(savedStep); // Set wizard to the saved step

			// Enable tab click functionality
			$tabs.on("click", function (e) {
				e.preventDefault();
				var index = $tabs.index(this);
				goToTab(index);
			});

			// Next button click
			$nextBtn.on("click", function (e) {
				e.preventDefault();
				if (currentIndex < $tabs.length - 1) {
					goToTab(currentIndex + 1);
				} else {
					alert(getTranslation("complete"));
				}
			});

			// Previous button click
			$prevBtn.on("click", function (e) {
				e.preventDefault();
				if (currentIndex > 0) {
					goToTab(currentIndex - 1);
				}
			});
		});
	};
})(jQuery);

// Plugin initialization
$("#tabsWizard").wizardPlugin({
	language: "es",
	actionButtonClass: "inverse",
	showCloseButton: true
});

</script>

@endsection
