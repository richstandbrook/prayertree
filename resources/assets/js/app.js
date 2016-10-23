
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
});


Vue.component('prayer-groups', {
  	template: '<ul class="js-prayer-trees homepage__prayer-tree-container">' + 
  	'<li class="homepage__no-prayer-tree" v-if="prayertrees.length == 0">You are not currently a part of any tree\'s</li>' +
  	'<li class="homepage__prayer-tree" v-for="tree in prayertrees">' +
  	'<a v-bind:href="\'prayertree/\' + tree.pin">' +
  	'<div> {{tree.name}} </div> <div>Pin: {{tree.pin}}</div>' +
  	'</a>' +
  	'</li>' +
  	'</ul>',
  	data: function(){
  		return data
  	}
})

const app = new Vue({
    el: '#app',
    data: {
        apipathfull: apipathfull
    }
});
