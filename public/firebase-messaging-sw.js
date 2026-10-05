importScripts("https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js");
importScripts("https://www.gstatic.com/firebasejs/9.22.2/firebase-messaging-compat.js");

firebase.initializeApp({
    apiKey: "AIzaSyApWJqJ5UV7aic51CGI4qM7C6q77QnW6F4",
    authDomain: "leaders-5300b.firebaseapp.com",
    projectId: "leaders-5300b",
    storageBucket: "leaders-5300b.firebasestorage.app",
    messagingSenderId: "338728992470",
    appId: "1:338728992470:web:01aba99987d46003359377"
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage(function(payload) {
    self.registration.showNotification(payload.notification.title, {
        body: payload.notification.body,
        icon: "/favicon.ico"
    });
});
