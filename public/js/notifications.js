jQuery(document).ready(function(){
    if(Notification.permission == "default"){
        Notification.requestPermission()
    }
    
    var title = "Cambalachea"
    var extra = {
        icon: "https://scontent-mia3-2.xx.fbcdn.net/v/t1.0-9/18199351_292705817842611_4689648123779858983_n.png?oh=3c7ef4576010c8d87d2b9ad7985b607f&oe=5ABDD0A1",
        body: "Bienvenido a cambalachea"
    }
    var noti = new Notification( title, extra)
    
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('/js/service-worker.js');
    }

    
})