/*
 * DragScroll 0.9.0 - jQuery Plugin
 * http://plugins.jquery.com/project/dragscroll
 *
 * Copyright (c) 2009 Radek Matìj
 * Dual licensed under the MIT and GPL licenses.
 *
 * DragScroll adds mouse dragging functionality to overflowed elements with
 * scrollbars similar to Adobe Reader or Google Maps dragging. DragScroll also
 * triggers special events on scrolling with overfloed element, so special
 * behavior can be bound to it.
 *
 * example:  $('#scroll').dragscroll();
 * 
 * Options:
 * - draggedClassName - The class name added to the element when dragging is
 *   active. Class name can be then used for aditional CSS styling (showing
 *   different cursor). The default value is "dragged".
 * - draggableSelector - jQuery selector for selecting the draggable part of
 *   the element. If specified, only matched child elements are draggable, else
 *   whole element content is draggable.
 *
 * example: $('#scroll').dragscroll({draggableSelector: 'div#drag-me'});
 *
 * Events:
 * - dragstart - Dragging starts.
 * - dragend - Dragging ends.
 * - scrollx - The element horizontal scroll position changes Vector parameter
 *   is supplied.
 * - scrolly - The element vertical scroll position changes. Vector parameter
 *   is supplied.
 *
 * example: $('#scroll').bind('dragstart', (function() { $(this).addClass('dragged') }));
 * example: $('#scroll').bind('scrollx', (function(e, vector) { console.log(vector) }));
 *
 * Requires jQuery version 1.2 and higher.
 */

(function($) {

	$.fn.dragscroll = create;

	$.fn.removedragscroll = remove;

	$.fn.dragscroll.options = {
		draggedClassName: 'dragged',
		draggableSelector: null
	};


 	// data keys
	var draggedKey = 'ds.dragged';
	var draggableKey = 'ds.draggable';


	/* Initializes DragScroll with given options on selected elements. */
	function create(options) {
		var settings = $.extend({}, $.fn.dragscroll.options, options);
	
		return this.each(function() {
			
			var container = $(this);

			// select draggable part & bind dragging start to it
			var draggable = settings.draggableSelector ?
				container.find(settings.draggableSelector) :
				container.children();
			draggable.bind('mousedown.ds', { container: container }, onMouseDown);

			// bind dragging end and scroll
			container
				.bind('mouseup.ds', onMouseUp)
				.bind('mouseleave.ds', onMouseLeave)
				.bind('scroll.ds', { left: this.scrollLeft, top: this.scrollTop }, onScroll);

			// bind adding / removing class if draggedClassName specified
			if (settings.draggedClassName)
				container
					.bind('dragstart.ds', { className: settings.draggedClassName }, onDragStart)
					.bind('dragend.ds', { className: settings.draggedClassName }, onDragEnd);
				
		});
	}


	/* Removes DragScroll from selected elements. */
	function remove() {
		return this.each(function() {
			var x = $(this).find('*').andSelf().unbind('.ds');
		});
	}


	/* Starts/binds dragging and starts storing previous mouse position. */
	function onMouseDown(e) {

		e.preventDefault();

		e.data.container
			.data(draggedKey, true)
			.trigger('dragstart')
			.bind('mousemove.ds', { prevX: e.screenX, prevY: e.screenY }, onMouseMove);
	}


	/* Provides the dragging functionality on mouse move event. */
	function onMouseMove(e) {

		e.preventDefault();

		var container = $(this);

		var xVector = e.data.prevX - e.screenX;
		var yVector = e.data.prevY - e.screenY;
		var newX = container.scrollLeft() + xVector;
		var newY = container.scrollTop() + yVector;

		container
			.scrollLeft(newX)
			.scrollTop(newY);

		e.data.prevY = e.screenY;
		e.data.prevX = e.screenX;
	}


	/* Ends/unbinds dragging when mouse leaves the container. */
	function onMouseLeave(e) {
		$(this).trigger('mouseup.ds');
	}


	/* Ends/unbinds dragging when mouse up (only if dragging is in progress). */
	function onMouseUp() {
		var container = $(this);
		if (container.data(draggedKey)) {
			container.unbind('mousemove.ds');
			container
				.data(draggedKey, false)
				.trigger('dragend');
		}
	}


	/* Triggers scrollx & scrolly events on scroll (dragging with mouse, moving
	 * with scrollbars, etc.). */
	function onScroll(e) {

		// this.scrollLeft/Top is faster then $(this).scrollLeft/Top()
		var newLeft = this.scrollLeft;
		var newTop = this.scrollTop;

		var xVector = newLeft - e.data.left;
		var yVector = newTop - e.data.top;

		if (xVector)
			$(this).trigger('scrollx', xVector);
		if (yVector)
			$(this).trigger('scrolly', yVector);

		e.data.left = newLeft;
		e.data.top = newTop;
	};


	/* Functions for adding / removing class on dragstart / dragend events. */
	function onDragStart(e) {
		$(this).addClass(e.data.className);
	};
	function onDragEnd(e) {
		$(this).removeClass(e.data.className);
	};


})(jQuery);