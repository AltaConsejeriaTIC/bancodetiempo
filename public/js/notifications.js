jQuery(document).ready(function(){
    
    
    //var title = "Cambalachea"
    /*var extra = {
        icon: "https://scontent-mia3-2.xx.fbcdn.net/v/t1.0-9/18199351_292705817842611_4689648123779858983_n.png?oh=3c7ef4576010c8d87d2b9ad7985b607f&oe=5ABDD0A1",
        body: "Bienvenido a cambalachea"
    }*/
    //var noti = new Notification( title, extra)
    
    jQuery("#btnPush").on("click", requestPermission);
    
    var config = {
        apiKey: "AIzaSyD-y5oAdUDspdNDac2uxVJxThzihJhlOzk",
        authDomain: "tommy-accesorios.firebaseapp.com",
        messagingSenderId: "869688763660",
    };
    firebase.initializeApp(config);
    
    const messaging = firebase.messaging();
    
  messaging.onTokenRefresh(function() {
    messaging.getToken()
    .then(function(refreshedToken) {
      console.log('Token refreshed.');
      setTokenSentToServer(false);
      sendTokenToServer(refreshedToken);
      resetUI();
    })
    .catch(function(err) {
      console.log('Unable to retrieve refreshed token ', err);
    });
  });
   
  messaging.onMessage(function(payload) {
    console.log("Message received. ", payload);
    appendMessage(payload);
  });

  function resetUI() {
    clearMessages();    
    messaging.getToken()
    .then(function(currentToken) {
      if (currentToken) {
        sendTokenToServer(currentToken);
        updateUIForPushEnabled(currentToken);
      } else {
        
        console.log('No Instance ID token available. Request permission to generate one.');
        updateUIForPushPermissionRequired();
        setTokenSentToServer(false);
      }
    })
    .catch(function(err) {
      console.log('An error occurred while retrieving token. ', err);
      setTokenSentToServer(false);
    });
  }
  // [END get_token]

  function showToken(currentToken) {
    console.log("showToken "+currentToken);
  }

  
  function sendTokenToServer(currentToken) {
    if (!isTokenSentToServer()) {
      console.log('Sending token to server...');
      jQuery.ajax({
          url: "saveTokenPushUser",
          method: "get",
          data : {token : currentToken},
          success : function(resp){
              
          }
      })
      setTokenSentToServer(true);
    } else {
      console.log('Token already sent to server so won\'t send it again ' +
          'unless it changes');
    }

  }

  function isTokenSentToServer() {
    return window.localStorage.getItem('sentToServer') == 1;
  }

  function setTokenSentToServer(sent) {
    window.localStorage.setItem('sentToServer', sent ? 1 : 0);
  }

  function showHideDiv(divId, show) {
    console.log("showHideDiv "+divId+" "+show);
  }

  function requestPermission() {
    console.log('Requesting permission...');
    messaging.requestPermission()
    .then(function() {
      console.log('Notification permission granted.');
      resetUI();
    })
    .catch(function(err) {
      console.log('Unable to get permission to notify.', err);
    });
  }

  function deleteToken() {
    messaging.getToken()
    .then(function(currentToken) {
      messaging.deleteToken(currentToken)
      .then(function() {
        console.log('Token deleted.');
        setTokenSentToServer(false);
        
        resetUI();
      })
      .catch(function(err) {
        console.log('Unable to delete token. ', err);
      });
    })
    .catch(function(err) {
      console.log('Error retrieving Instance ID token. ', err);
      showToken('Error retrieving Instance ID token. ', err);
    });

  }

  function appendMessage(payload) {
    console.log('appendMessage '+payload)
  }

  function clearMessages() {
    console.log("limpiar")
  }

  function updateUIForPushEnabled(currentToken) {
      console.log("hacer cuando token ya existe")
      jQuery("#btnPush").addClass("hide");
  }

  function updateUIForPushPermissionRequired() {
    console.log("hacer cuando token es requerido");
    jQuery("#btnPush").removeClass("hide");
  }

  resetUI();
    
})