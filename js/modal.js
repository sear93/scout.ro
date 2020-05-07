/* AJAX */
$( document ).ready(function() {
    $(".modal-submit").click(
    function(){      
	      sendAjaxForm('result_form', 'ajax_form', 'action.php');
	      return false; 
	    }
  	);
  $(".sbscrb-submit").click(
    function(){      
      if($('#email-submit').val() != '' ){
        $('.tab.result').css("display","none");
        $('.modal.result').removeClass("result");
        $('.modal').addClass("senx");
        $('.tab.senx').css("display","block");
        $('#nextBtn').css("display","none");
        $('#email-submit').removeClass('invalid');
        sendAjaxFormSubmit('result_sumscribe', 'modal_subscribe', 'action.php');
        return false; 
      }
      else{
        $('#email-submit').addClass('invalid');
      }
    }
  );

  /* Modal Close */  
  $( ".getfood, .modal-close" ).click(function(){
    $( ".modal-mask" ).slideToggle(); 
  });
  $('.tst-modal-overlay').on('click', function() {            
      modalDestroy();
  });
  function modalDestroy() {
      $( ".modal-mask" ).slideToggle();
  }

  var url = window.location;
  var queryString = url.href ? url.href.split('?')[1] : window.location.search.slice(1);
  if( queryString == 'scout-test' ){
    $( ".modal-mask" ).slideToggle();
  }
  if( queryString == 'scout-buy' ){    
    $('#modal-overlay').addClass('on');
    $('#modal-1').addClass('on');
  }

});
 
/* AJAX SUBSCRIBE */ 
function sendAjaxFormSubmit(result_form, ajax_form, url) {
    $.ajax({
        url:     "action.php", //url страницы (action_ajax_form.php)
        type:     "GET", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
          	result = JSON.parse(response);
          	$('#modal_subscribe_result').html(result.status);
          	// console.log(result.status);
	      },
	      error: function(response) { // Данные не отправлены
	        	result = JSON.parse(response);
	  			$('#modal_subscribe_result').html(result.status);
	  			// console.log(result.status);
	      }
  });
}
/* AJAX TEST */
function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url:     "action.php", //url страницы (action_ajax_form.php)
        type:     "GET", //метод отправки
        dataType: "html", //формат данных
        data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
          result = JSON.parse(response);
          if(result.food.other == 'true'){
            $('#result_form').addClass('other');
            $('.modal.result').addClass('other');
          }
          if(result.food.other == 'active'){
            $('#result_form').addClass('other_active');
          }
          $('#result_box').html(result.food.name);
          $('#result_desc').html(result.food.info);
          $('#result_id').attr('value', result.id);
          $('#result_img img').attr('src', 'img/'+result.food.img);
      },
      error: function(response) { // Данные не отправлены
            $('#result_box').html('Помилка.');
      }
  });
}

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  
  var progCircle = document.getElementById("progress-circle");
  

  //... and fix the Previous/Next buttons:
  if (n == 0) {    
    document.getElementById("nextBtn").innerHTML = "Почати тест";    
  } 
  if(n <= 1){
      document.getElementById("prevBtn").style.display = "none";      
  }
  else {
    document.getElementById("prevBtn").style.display = "inline";    
  }
  if (n != 0) {
    document.getElementById("nextBtn").innerHTML = "Далі";
    // progressCircle(n);
    // document.getElementById("step-number").innerHTML = n;
    document.getElementById("steps-progress").innerHTML = '<img src="img/form-steps/step'+ n +'.png">';
  }
  if(n > 6){
    document.getElementById("steps-progress").style.display = "none"; 
  }
  if(x[n].classList.contains('last')){
    document.getElementById("nextBtn").className += " modal-submit";
  }
  if(x[n].classList.contains('result') || x[n].classList.contains('senx')){
    document.getElementById("prevBtn").style.display = "none"; 
    document.getElementById("modal").className += " result";
  }
  
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  // if(document.getElementById("nextBtn").classList.contains('modal-submit')){
  //   document.getElementById("regForm").submit();
  //   return false;
  // }
  if (currentTab >= x.length-1) {
  	document.getElementById("prevBtn").style.display = "none";
    document.getElementById("nextBtn").style.display = "none";
  }
  if (currentTab >= x.length-2) {
  	document.getElementById("prevBtn").style.display = "none";
    document.getElementById("nextBtn").style.display = "none";
      
    sendAjaxForm('result_form', 'ajax_form', 'action.php');
  }
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, label, valid = true;
  var validArr = [];
  
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  label = x[currentTab].getElementsByTagName("label");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
    /* PICE of Radio Button Validation  */
    

    if( y[i].getAttribute("type") == "radio"){
      var name = y[i].getAttribute("name");
      var rBtn = document.getElementsByName(name);
                    
      if( document.getElementsByName(name)[i].checked == false){
        if(!x[currentTab].classList.contains('invalid')){
          x[currentTab].className += " invalid";
        }

        validArr[i] = 'false';
      } 
      else{
        validArr[i] = 'true';       
      }
    }
  }
  if( validArr.length != 0 && validArr.indexOf('true') == -1){ valid = false; } 
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    /*document.getElementsByClassName("step")[currentTab].className += " finish";*/
  }
  return valid; // return the valid status
}

$('.subtt input').on('click', function(){
  $('#asc-text').html($(this).data('sub'));
});

$('.radio_btn').on('click', function(){
  $('.tab').removeClass('invalid');
});

// function subData(){
//   var x, y, i;
//   x = document.getElementsByClassName("tab");
//   y = x[currentTab].getElementsByTagName("input");
//   console.log(this);
//   var subtt = this.dataset.sub;
//   // $('#asc-text').html(subtt);

// } 

/*
function progressCircle(n) {
  var colors = {
      'pink': '#E1499A',
      'yellow': '#f0ff08',
      'green': '#999B30'
  };

  var color = colors.green;

  var radius = 42;
  var border = 1;
  var padding = 5;
  var startPercent = 0;
  if(n == 0){
    var endPercent = 0;
  }
  else{
    var endPercent = (1 / 6) * n ;
  }


  var twoPi = Math.PI * 2;
  var formatPercent = d3.format('.0%');
  var boxSize = (radius + padding) * 2;


  var count = Math.abs((endPercent - startPercent) / 0.01);
  var step = endPercent < startPercent ? -0.01 : 0.01;

  var arc = d3.svg.arc()
      .startAngle(0)
      .innerRadius(radius)
      .outerRadius(radius - border);

  var parent = d3.select('.steps-progress');
  var svg = d3.select('#progress-circle');
    var svg = parent.append('svg')
        .attr('width', boxSize)
        .attr('height', boxSize)
        .attr('id', 'progress-circle');
      
    

    // var front = meter.append('path')
    //     .attr('class', 'foreground')
    //     .attr('fill', color)
    //     .attr('fill-opacity', 1);

    // var numberText = meter.append('text')
    //     .attr('fill', '#fff')
    //     .attr('text-anchor', 'middle')
    //     .attr('dy', '.35em');

    function updateProgress(progress) {

        var defs = svg.append('defs');

        var filter = defs.append('filter')
            .attr('id', 'blur');


        filter.append('feGaussianBlur')
            .attr('in', 'SourceGraphic')
            .attr('stdDeviation', '0.5');

        var g = svg.append('g')
            .attr('transform', 'translate(' + boxSize / 2 + ',' + boxSize / 2 + ')');

        var meter = g.append('g')
            .attr('class', 'progress-meter');

        meter.append('path')
            .attr('class', 'background')
            .attr('fill', '#ccc')
            .attr('fill-opacity', 1)
            .attr('d', arc.endAngle(twoPi));

        var foreground = meter.append('path')
            .attr('class', 'foreground')
            .attr('fill', color)
            .attr('fill-opacity', 1)
            .attr('stroke', color)
            .attr('stroke-width', 1)
            .attr('stroke-opacity', 1)
            .attr('filter', 'url(#blur)');

        foreground.attr('d', arc.endAngle(twoPi * progress));
        // front.attr('d', arc.endAngle(twoPi * progress));
        // numberText.text(formatPercent(progress));
    }

    var progress = startPercent;

    (function loops() {
        updateProgress(progress);

        if (count > 0) {
            count--;
            progress += step;
            loops();
            // setTimeout(loops, 5);
        }
    })();
}*/