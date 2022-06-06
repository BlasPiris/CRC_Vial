VanillaClockPicker = function (_document) {
	this.inputTime = null;
	this.hourSelected = null;
	this.minuteSelected = null;
	this.doc = _document;
	this.opened = false;
	this.pad = function(s) { return (s < 10) ? '0' + s : s; };
	this.clockPickerContainer = _document.createElement('div');
	var timestamp = new Date().getTime();
	var idClockPickerContainer = 'clockPicker'+timestamp;
	this.clockPickerContainer.setAttribute('id', idClockPickerContainer);
	this.clockPickerContainer.setAttribute('class', 'clockPicker-container');
	this.clockPickerContainer.innerHTML = 
		' <div class="arrow"></div> ' +
		' <div class="clockPicker-hourSelected"> ' +
		' 	<span name="clockPicker-spanHourSelected">10</span>:<span name="clockPicker-spanMinuteSelected">15</span> ' +
		' </div> ' +
		' <div class="clockPicker-content"> ' +
		' 	<div class="clockPicker-plate"> ' +
		' 		<div class="clockPicker-backgroundCircle"> ' +
		' 			<svg xmlns="http://www.w3.org/2000/svg" class="clockPicker-svg" width="200" height="200"> ' +
		' 				<g transform="translate(100 100)"> ' +
		' 					<line name="clockHands" x1="0" y1="0" x2="-46.7654" y2="-27" /> ' +
		' 					<!--circle class="clockHandsCenter" cx="-46.7654" cy="-27" r="3.5" /--> ' +
		' 					<circle name="clockHandsTarget" class="clockHandsTarget" cx="0" cy="-54" r="13" /> ' +
		' 					<circle class="clockHandsCenter" cx="0" cy="0" r="2" /> ' +
		' 				</g> ' +
		' 			</svg> ' +
		' 		</div> ' +
		' 		<div class="clockPicker-hours" name="clockPicker-hours" style="visibility: visible;"> ' +
		' 			<div class="clockPicker-tick" style="left: 87px; top: 7px;">0</div> ' +
		' 			<div class="clockPicker-tick" style="left: 114px; top: 40.23px; font-size: 120%;">1</div> ' +
		' 			<div class="clockPicker-tick" style="left: 133.76px; top: 60px; font-size: 120%;">2</div> ' +
		' 			<div class="clockPicker-tick" style="left: 141px; top: 87px; font-size: 120%;">3</div> ' +
		' 			<div class="clockPicker-tick" style="left: 133.76px; top: 113.99px; font-size: 120%;">4</div> ' +
		' 			<div class="clockPicker-tick" style="left: 114px; top: 133.76px; font-size: 120%;">5</div> ' +
		' 			<div class="clockPicker-tick" style="left: 87px; top: 141px; font-size: 120%;">6</div> ' +
		' 			<div class="clockPicker-tick" style="left: 60px; top: 133.76px; font-size: 120%;">7</div> ' +
		' 			<div class="clockPicker-tick" style="left: 40.23px; top: 114px; font-size: 120%;">8</div> ' +
		' 			<div class="clockPicker-tick" style="left: 33px; top: 87px; font-size: 120%;">9</div> ' +
		' 			<div class="clockPicker-tick" style="left: 40.23px; top: 60px; font-size: 120%;">10</div> ' +
		' 			<div class="clockPicker-tick" style="left: 59.99px; top: 40.23px; font-size: 120%;">11</div> ' +
		' 			<div class="clockPicker-tick" style="left: 87px; top: 33px; font-size: 120%;">12</div> ' +
		' 			<div class="clockPicker-tick" style="left: 126.99px; top: 17.71px;">13</div> ' +
		' 			<div class="clockPicker-tick" style="left: 156.28px; top: 47px;">14</div> ' +
		' 			<div class="clockPicker-tick" style="left: 167px; top: 86.99px;">15</div> ' +
		' 			<div class="clockPicker-tick" style="left: 156.28px; top: 126.99px;">16</div> ' +
		' 			<div class="clockPicker-tick" style="left: 127px; top: 156.28px;">17</div> ' +
		' 			<div class="clockPicker-tick" style="left: 87px; top: 167px;">18</div> ' +
		' 			<div class="clockPicker-tick" style="left: 47px; top: 156.28px;">19</div> ' +
		' 			<div class="clockPicker-tick" style="left: 17.71px; top: 127px;">20</div> ' +
		' 			<div class="clockPicker-tick" style="left: 7px; top: 87px;">21</div> ' +
		' 			<div class="clockPicker-tick" style="left: 17.71px; top: 47px;">22</div> ' +
		' 			<div class="clockPicker-tick" style="left: 47px; top: 17.71px;">23</div> ' +
		' 		</div> ' +
		' 		<div class="clockPicker-minutes" name="clockPicker-minutes" style="visibility: hidden;"> ' +
		' 			<div class="clockPicker-tick" style="left: 87px; top: 7px; font-size: 120%;">0</div> ' +
		' 			<div class="clockPicker-tick" style="left: 127px; top: 17.71px; font-size: 120%;">5</div> ' +
		' 			<div class="clockPicker-tick" style="left: 156.28px; top: 46.99px; font-size: 120%;">10</div> ' +
		' 			<div class="clockPicker-tick" style="left: 167px; top: 87px; font-size: 120%;">15</div> ' +
		' 			<div class="clockPicker-tick" style="left: 156.28px; top: 127px; font-size: 120%;">20</div> ' +
		' 			<div class="clockPicker-tick" style="left: 127px; top: 156.28px; font-size: 120%;">25</div> ' +
		' 			<div class="clockPicker-tick" style="left: 87px; top: 167px; font-size: 120%;">30</div> ' +
		' 			<div class="clockPicker-tick" style="left: 46.99px; top: 156.28px; font-size: 120%;">35</div> ' +
		' 			<div class="clockPicker-tick" style="left: 17.71px; top: 127px; font-size: 120%;">40</div> ' +
		' 			<div class="clockPicker-tick" style="left: 7px; top: 87px; font-size: 120%;">45</div> ' +
		' 			<div class="clockPicker-tick" style="left: 17.71px; top: 46.99px; font-size: 120%;">50</div> ' +
		' 			<div class="clockPicker-tick" style="left: 46.99px; top: 17.71px; font-size: 120%;">55</div> ' +
		' 		</div> ' +
		' 	</div> ' +
		' </div> ';

	var _self = this;
	var closeButton = this.doc.createElement('button');
	closeButton.addEventListener('click', _self.hideClockPicker.bind(_self));
	closeButton.innerHTML = 'Cerrar';
	closeButton.setAttribute('class', 'clockPicker-closeButton');
	var divButtonContainer = this.doc.createElement('div');
	divButtonContainer.appendChild(closeButton);
	this.clockPickerContainer.appendChild(divButtonContainer);
	((this.doc.getElementsByTagName('body'))[0]).appendChild(this.clockPickerContainer);

	var clockHourTicks = 
		(this.clockPickerContainer.querySelector('[name="clockPicker-hours"]'))
			.querySelectorAll('[class="clockPicker-tick"]');
	
	for (var i = clockHourTicks.length - 1; i >= 0; i--) {
		clockHourTicks[i].addEventListener('mousedown', _self.moveClockHandsToTick.bind(_self, clockHourTicks[i]));
		clockHourTicks[i].addEventListener('mouseup', _self.tickHourMouseReleased.bind(_self, clockHourTicks[i]));
		clockHourTicks[i].setAttribute('value', _self.pad(clockHourTicks[i].innerHTML));
	}

	var clockMinutesTicks = 
		(this.clockPickerContainer.querySelector('[name="clockPicker-minutes"]'))
			.querySelectorAll('[class="clockPicker-tick"]');
	for (var i = clockMinutesTicks.length - 1; i >= 0; i--) {
		clockMinutesTicks[i].addEventListener('mousedown', _self.moveClockHandsToTick.bind(_self, clockMinutesTicks[i]));
		clockMinutesTicks[i].addEventListener('mouseup', _self.tickMinuteMouseReleased.bind(_self, clockMinutesTicks[i]));
		clockMinutesTicks[i].setAttribute('value', _self.pad(clockMinutesTicks[i].innerHTML));
	}
	this._fireEvent = function(eventName, element){
		var event; // The custom event that will be created
		if (document.createEvent) {
			event = document.createEvent("HTMLEvents");
			event.initEvent(eventName, true, true);
		} else {
			event = document.createEventObject();
			event.eventType = eventName;
		}
		event.eventName = eventName;

		if (document.createEvent) {
			element.dispatchEvent(event);
		} else {
			element.fireEvent("on" + event.eventType, event);
		}
	}
}

VanillaClockPicker.prototype.showClockPicker = function(inputElement) {
	var minutesPicker = this.clockPickerContainer.querySelector('[name="clockPicker-minutes"]');
	var hoursPicker = this.clockPickerContainer.querySelector('[name="clockPicker-hours"]');
	hoursPicker.classList.remove('hideMinutesPickerTransition');
	minutesPicker.style.visibility = 'hidden';
	minutesPicker.style.opacity = 0;
	minutesPicker.classList.remove('hideClockPicker');
	
	this.inputTime = inputElement;
	this.hourSelected = (this.inputTime.value=='')? '00' : (this.inputTime.value).substring(0, 2);
	if(parseInt(this.hourSelected)>23) this.hourSelected = '00';
	this.minuteSelected = (this.inputTime.value=='')? '00' : (this.inputTime.value).substring(3, 5);
	this.minuteSelected = this.pad(5 * Math.round(parseInt(this.minuteSelected) / 5));
	if(parseInt(this.minuteSelected)>59) this.minuteSelected = '00';

	var hourTick = (this.clockPickerContainer.querySelector('[name="clockPicker-hours"]'))
		.querySelector('[value="'+this.hourSelected+'"]');
	this.moveClockHandsToTick(hourTick);
	(this.clockPickerContainer.querySelector('[name="clockPicker-spanHourSelected"]')).innerHTML = this.hourSelected;
	(this.clockPickerContainer.querySelector('[name="clockPicker-spanMinuteSelected"]')).innerHTML = this.minuteSelected;
	
    var styles = window.getComputedStyle(this.inputTime);
    var margin = parseFloat(styles['marginTop']) + parseFloat(styles['marginBottom']);
    var inputHeight = Math.ceil(this.inputTime.offsetHeight + margin);
    this.clockPickerContainer.style.top = inputHeight + this.inputTime.offsetTop -  2 + "px";
    this.clockPickerContainer.style.left = this.inputTime.offsetLeft + 10 + "px";
    this.clockPickerContainer.style.display = 'block';
    this.clockPickerContainer.style.zIndex = '99999';

    var _self = this;
    this.clockPickerContainer.classList.add('showClockPicker');
    setTimeout(function(){
        _self.clockPickerContainer.classList.remove('showClockPicker');
    }, 300);
    this.opened = true;
};

VanillaClockPicker.prototype.moveClockHandsToTick = function(tickElement) {
	const XY_canvas_center = 87;
	var left = parseFloat(tickElement.style.left);
	var top = parseFloat(tickElement.style.top);
	var desplazamientoX = Math.abs(XY_canvas_center - left);
	if(left < XY_canvas_center) desplazamientoX *= -1;
	var desplazamientoY = Math.abs(XY_canvas_center - top);
	if(top < XY_canvas_center) desplazamientoY *= -1;
	var clockHandsTarget = this.clockPickerContainer.querySelector('[name="clockHandsTarget"]');
	clockHandsTarget.setAttribute('cx', desplazamientoX);
	clockHandsTarget.setAttribute('cy', desplazamientoY);

	var clockHands = this.clockPickerContainer.querySelector('[name="clockHands"]');
	clockHands.setAttribute('x2', desplazamientoX);
	clockHands.setAttribute('y2', desplazamientoY);
};


VanillaClockPicker.prototype.tickHourMouseReleased = function(tickElement){
	var spanHourSelected = this.clockPickerContainer.querySelector('[name="clockPicker-spanHourSelected"]');
	spanHourSelected.innerHTML = this.pad(tickElement.innerHTML);
	var spanMinuteSelected = this.clockPickerContainer.querySelector('[name="clockPicker-spanMinuteSelected"]');
	this.inputTime.value = spanHourSelected.innerHTML+':'+spanMinuteSelected.innerHTML;
	this.showMinutesSelector();
};

VanillaClockPicker.prototype.showMinutesSelector = function() {
	var hoursPicker = this.clockPickerContainer.querySelector('[name="clockPicker-hours"]');
	hoursPicker.classList.add('hideMinutesPickerTransition');
	var minutesPicker = this.clockPickerContainer.querySelector('[name="clockPicker-minutes"]');
	minutesPicker.style.visibility = 'visible';
	minutesPicker.style.opacity = 1;

	var minute = (this.clockPickerContainer.querySelector('[name="clockPicker-minutes"]'))
		.querySelector('[value="'+this.minuteSelected+'"]');
	var _self = this;
	setTimeout(_self.moveClockHandsToTick.bind(_self, minute), 200);
};

VanillaClockPicker.prototype.tickMinuteMouseReleased = function(tickElement) {
	var spanHourSelected = this.clockPickerContainer.querySelector('[name="clockPicker-spanHourSelected"]');
	var spanMinuteSelected = this.clockPickerContainer.querySelector('[name="clockPicker-spanMinuteSelected"]');
	spanMinuteSelected.innerHTML = this.pad(tickElement.innerHTML);
	this.inputTime.value = spanHourSelected.innerHTML+':'+spanMinuteSelected.innerHTML;
	this.hideClockPicker();
	//if(this.inputTime.onchange != null) this.inputTime.onchange();
	this._fireEvent('change', this.inputTime);
};

VanillaClockPicker.prototype.hideClockPicker = function() {
	var minutesPicker = this.clockPickerContainer.querySelector('[name="clockPicker-minutes"]');
	minutesPicker.classList.add('hideClockPicker');
	var _self = this;
	setTimeout(function(){
		_self.clockPickerContainer.style.display = 'none';
	}, 200);
	this.opened = false;
};

VanillaClockPicker.prototype.isOpened = function() {
	return this.opened;
};

VanillaClockPicker.prototype.getContainer = function(){
	return this.clockPickerContainer;
}