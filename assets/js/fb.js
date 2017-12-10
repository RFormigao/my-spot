  function fbAsyncInit ()
  {
	  FB.init({
		appId      : '524954387866346',
		cookie     : true,  // enable cookies to allow the server to access 
							// the session
		xfbml      : true,  // parse social plugins on this page
		version    : 'v2.2' // use version 2.2
    });
    
    window.checkLoginState = function() {
      FB.getLoginStatus(function(response) {
        if (response.status == "connected") {
          testAPI();
        }
      });
    }

  };

  (function(d, s, id)
  {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }
  (document, 'script', 'facebook-jssdk'));

  function testAPI() {
	
    FB.api('/me', {fields:'email,name,gender,id,short_name'},function(response) {
      insert_user(response.name,response.email, response.short_name);		
    });
  }
