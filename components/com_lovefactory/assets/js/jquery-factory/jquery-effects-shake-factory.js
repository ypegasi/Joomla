/*
 * jQuery UI Effects Shake 1.8.2
 *
 * Copyright (c) 2010 AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT (MIT-LICENSE.txt)
 * and GPL (GPL-LICENSE.txt) licenses.
 *
 * http://docs.jquery.com/UI/Effects/Shake
 *
 * Depends:
 *	jquery.effects.core.js
 */
(function($){$.effects.shake=function(o){return this.queue(function(){var el=$(this),props=['position','top','left'];var mode=$.effects.setMode(el,o.options.mode||'effect');var direction=o.options.direction||'left';var distance=o.options.distance||20;var times=o.options.times||3;var speed=o.duration||o.options.duration||140;$.effects.save(el,props);el.show();$.effects.createWrapper(el);var ref=(direction=='up'||direction=='down')?'top':'left';var motion=(direction=='up'||direction=='left')?'pos':'neg';var animation={},animation1={},animation2={};animation[ref]=(motion=='pos'?'-=':'+=')+distance;animation1[ref]=(motion=='pos'?'+=':'-=')+distance*2;animation2[ref]=(motion=='pos'?'-=':'+=')+distance*2;el.animate(animation,speed,o.options.easing);for(var i=1;i<times;i++){el.animate(animation1,speed,o.options.easing).animate(animation2,speed,o.options.easing);};el.animate(animation1,speed,o.options.easing).animate(animation,speed/2,o.options.easing,function(){$.effects.restore(el,props);$.effects.removeWrapper(el);if(o.callback)o.callback.apply(this,arguments);});el.queue('fx',function(){el.dequeue();});el.dequeue();});};})(jQueryFactory);