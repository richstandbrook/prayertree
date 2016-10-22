
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('prayer_requests', require('./components/prayer_requests.vue'));
Vue.component('example', require('./components/Example.vue'));

var data = {
	prayertrees: []
};

var apipathfull = '/prayertrees';

$.getJSON(apipathfull, function(jsondata) {
 	data.prayertrees = ( jsondata );
 	//data.prayertreeobject = jsondata;

	// for (var key in jsondata) {
	// 	if (jsondata.hasOwnProperty(key)) {
	// 		data.prayertreeobject +='<div>' + JSON.stringify(jsondata[key].name) + '</div>';
	// 	}
	// }

});


Vue.component('prayer-groups', {
  	template: '<ul class="js-prayer-trees homepage__prayer-tree-container">' + 
  	'<li v-if="prayertrees.length == 0">You are not currently a part of any tree\'s</li>' +
  	'<li class="homepage__prayer-tree" v-for="tree in prayertrees">' +
  	' <div> {{tree.name}} </div> <div>Pin: {{tree.pin}}</div>' +
  	' </li>' +
  	' </ul>',
  	data: function(){
  		return data
  	}
  	//data: function(){
	//	return {prayertreeobject: ['a']}
  	//},
  // 	//created: function(){
  // 		
  // 		//var apipathfull = 'http://localhost:8081/mock-api/prayertrees.json';
  // 		//alert(apipathfull);
  // 		console.log(this);
  // 		//var data = this.data;

		// // $.getJSON(apipathfull, function(jsondata) {
		// //     //alert(JSON.stringify( jsondata ) );
		// //     //testvar1 = jsondata;
		// // 	var data = (JSON.stringify( jsondata ) );
		// //     //data.prayertreeobject = (JSON.stringify( jsondata ) );
		// //     alert(data);
		// // });
  		
  // 	}


})



//alert(JSON.stringify( testvar ) );

const app = new Vue({
    el: '#app',
    data: {
        apipathfull: apipathfull
    }
});
/*
function test(){
	alert('hello');
	var jqxhr = $.getJSON( "http://localhost:8081/mock-api/prayertrees.json", function() {
			console.log( "success" );
		})
		.done(function() {
			console.log( "second success" );
		})
		.fail(function() {
			console.log( "error" );
		})
		.always(function() {
			console.log( "complete" );
		});
}

test();
*/