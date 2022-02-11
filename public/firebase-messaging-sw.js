/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');
   
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
const firebaseConfig = {
  apiKey: "AIzaSyB_MfR0_S-UGZsJM1bgvr3Z346Gqq6z-KU",
  authDomain: "laravel-fcm-dbf71.firebaseapp.com",
  projectId: "laravel-fcm-dbf71",
  storageBucket: "laravel-fcm-dbf71.appspot.com",
  messagingSenderId: "215452711077",
  appId: "1:215452711077:web:7b1d8a86c2a8201aa8b54c",
  measurementId: "G-TF1GF7R9QT"
};
  
/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );
    /* Customize notification here */
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };
  
    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});
