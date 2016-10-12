/*
 * dom.js is a single page javascript framework
 * to control various methods of functionality for
 * the portfolio site. Any reproduction of the code
 * for other sites is permitted provided permission
 * from the author.
 *
 * Author: Dominic Farolino
 * Email: domfarolino@gmail.com
 * Website: http://www.domfarolino.com
 * Date: 10/9/14
 *
 */
var DOMINIC = DOMINIC || (function(){
	var public = {};


	var colorManage = {
		trigger: document.getElementById('color-trigger'),
		
		texts: function(){
			return document.getElementsByClassName('text-color');
		},

		backdrops: function(){
			return document.getElementsByClassName('backdrop-color');
		},

		backgrounds: function(){
			return document.getElementsByClassName('background-color');
		},

		changeColorScheme: function(){
			//not yet
		}


	};

	public.setColorRotation = function(colors){
		colorManage.textColors = colors.textColors;
		colorManage.backdropColors = colors.backdropColors;
		colorManage.backgroundColors = colors.backgroundColors;
	};

	return public;
})();

DOMINIC.setColorRotation({
	textColors: ['pink',  'blue', 'green'],
	backdropColors: ['pink', 'blue', 'green'],
	backgroundColors: ['white', 'green', 'blue']
});