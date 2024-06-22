
  <div class="col-lg-4" style="padding-top: 20px;">
    <div class="social-feed-element {{? !it.moderation_passed}}hidden{{?}}" dt-create="{{=it.dt_create}}" social-feed-id = "{{=it.id}}">
        <div class='content'>
              <div style="display:block;">
              <a class="pull-left" href="{{=it.author_link}}" target="_blank">
                  <img class="media-object" src="{{=it.author_picture}}">
              </a>
              <div class="media-body">
                <p class="pull-left">
                    <i class="fa fa-{{=it.social_network}} pull-left" style="color:#0a2142;" ></i>
                    <br>
                    <span class="author-title pull-left">{{=it.author_name}}</span>
                <br>
                  <span class="muted pull-left"> {{=it.time_ago}}</span>
                </p>
              </div>
            </div>
              <div class='text-wrapper' style="display:block;">
                <p class="social-feed-text" style="color:black;">{{=it.text}} <a href="{{=it.link}}" target="_blank" class="read-button">Ver Tweet...</a></p>
              </div>
        </div>
        {{=it.attachment}}
    </div>
  </div>
