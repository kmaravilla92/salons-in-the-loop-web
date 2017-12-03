import * as firebase from 'firebase';
import {firebase_config} from './config/firebase';

var app = firebase.initializeApp(firebase_config);
var firebaseDb = app.database();
var connectedRef = firebase.database().ref(".info/connected");
var isPro = document.getElementById('user_type').value == 'professional';
if(isPro){
	var userConnectionRef = firebaseDb.ref('professionals/professional-'+userId+'/is_online');
	var lastOnlineRef = firebaseDb.ref('professionals/professional-'+userId+'/last-online');

	connectedRef.on('value', function(snapshot){
		if(snapshot.val() != null){
			userConnectionRef.onDisconnect().set(false);
			userConnectionRef.set(true);
		}
	});
}
