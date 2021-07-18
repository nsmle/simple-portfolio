// FOR NAVBAR ON SCROLL TOP HIDE AND SCROLL BOTTOM SHOW
window.onscroll = function(e) {
  if (this.oldScroll > this.scrollY) {
    document.getElementById('navbar').classList.remove('hide-top');
    document.getElementById('navbar').classList.add('show-top');
    document.getElementById('navbar-bottom').classList.remove('hide-bottom');
    document.getElementById('navbar-bottom').classList.add('show-bottom');
    //console.log('show');
  }else {
    //console.log(this.oldScroll);
    //console.log('hide');
    document.getElementById('navbar-bottom').classList.remove('show-bottom');
    document.getElementById('navbar-bottom').classList.add('hide-bottom');
    document.getElementById('navbar').classList.remove('show-top');
    document.getElementById('navbar').classList.add('hide-top');
  }
  this.oldScroll = this.scrollY;
};


function underDevelopment() {
  var check = confirm('This project is still under development, Contact me to know the progress and you can also contribute to this project.\n\nContact me?');
  if ( check ) {
    location.href = "#contact";
  }
}

// FALIDATION INPUT
function contactMe() {
  
  var name = document.getElementById('name');
  var email = document.getElementById('email');
  var phone = document.getElementById('phone');
  var message = document.getElementById('message');
  
  let divForm = document.querySelector('#form-contact');
  
  if ( name.value == "" ) {
    name.classList.add('is-invalid');
    return;
  } else if ( email.value == "" ) {
    divForm.classList.remove('is-invalid');
    email.classList.add('is-invalid');
    return;
  } else if ( phone.value == "" ) {
    name.classList.remove('is-invalid');
    email.classList.remove('is-invalid');
    phone.classList.add('is-invalid');
    return;
  } else if ( message.value == "" ) {
    name.classList.remove('is-invalid');
    email.classList.remove('is-invalid');
    phone.classList.remove('is-invalid');
    message.classList.add('is-invalid');
    return;
  }
  contact();
}

function contact() {
  var name = document.getElementById('name').value;
  var email = document.getElementById('email').value;
  var message = document.getElementById('message').value;
  var phone = document.getElementById('phone').value;
  //ANIMATE CONTACT LOADING
  document.getElementById('form-contact').innerHTML = '<div class=".gifloader"><svg width="300" height="120" id="clackers">' +
    '<!-- Left arc path -->' +
    '<svg>' +
      '<path id="arc-left-up" fill="none" d="M 90 90 A 90 90 0 0 1 0 0"/>'+
    '</svg>'+
    '<!-- Right arc path -->' +
    '<svg>'+
      '<path id="arc-right-up" fill="none" d="M 100 90 A 90 90 0 0 0 190 0"/>'+
    '</svg>'+
    
    '<text x="150" y="50" class="text-contact"'+
    '      text-anchor="middle">'+
      'Please Wait'+
    '</text>'+
    '<circle cx="15" cy="15" r="15">'+
      '<!-- I used a python script to calculate the keyPoints and keyTimes based on a quadratic function. -->'+
      '<animateMotion dur="1.5s" repeatCount="indefinite"'+
        'calcMode="linear"'+
        'keyPoints="0.0;0.19;0.36;0.51;0.64;0.75;0.84;0.91;0.96;0.99;1.0;0.99;0.96;0.91;0.84;0.75;0.64;0.51;0.36;0.19;0.0;0.0;0.05;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0"'+
        'keyTimes="0.0;0.025;0.05;0.075;0.1;0.125;0.15;0.175;0.2;0.225;0.25;0.275;0.3;0.325;0.35;0.375;0.4;0.425;0.45;0.475;0.5;0.525;0.55;0.575;0.6;0.625;0.65;0.675;0.7;0.725;0.75;0.775;0.8;0.825;0.85;0.875;0.9;0.925;0.95;0.975;1.0">'+
        '<mpath xlink:href="#arc-left-up"/>'+
      '</animateMotion>'+
    '</circle>'+
    '<circle cx="135" cy="105" r="15" />'+
    '<circle cx="165" cy="105" r="15" />'+
    '<circle cx="95" cy="15" r="15">'+
      '<animateMotion dur="1.5s" repeatCount="indefinite"'+
        'calcMode="linear"'+
        'keyPoints="0.0;0.0;0.05;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0.0;0.19;0.36;0.51;0.64;0.75;0.84;0.91;0.96;0.99;1.0;0.99;0.96;0.91;0.84;0.75;0.64;0.51;0.36;0.19;0.0"'+
        'keyTimes="0.0;0.025;0.05;0.075;0.1;0.125;0.15;0.175;0.2;0.225;0.25;0.275;0.3;0.325;0.35;0.375;0.4;0.425;0.45;0.475;0.5;0.525;0.55;0.575;0.6;0.625;0.65;0.675;0.7;0.725;0.75;0.775;0.8;0.825;0.85;0.875;0.9;0.925;0.95;0.975;1.0">'+
        '<mpath xlink:href="#arc-right-up"/>'+
      '</animateMotion>'+
    '</circle>'+
  '</svg>'+
  '</div>';
  
  // AJAX FOR SEND DATA
  $.ajax({
    url: 'http://localhost:8000/nsmle-project/home/contact',
    data: {name : name, email : email, phone : phone, message : message},
    method: 'post',
    success: function(data){
        document.getElementById('form-contact').innerHTML = data;
        console.log(data);
    },
    error: function(msg) {
        console.log(msg);
    }
  });
  
}

// FOR RESET FORM
function resetForm()
{
  document.getElementById('form-contact').innerHTML = '<div class="mb-3">'+
      '<input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>'+
      '<div class="invalid-feedback">'+
     ' Please enter your full name.'+
     '</div>'+
   '</div>'+
   '<div class="mb-3">'+
    ' <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>'+
     '<div class="invalid-feedback">'+
      ' Please enter your email address.'+
     '</div>'+
   '</div>'+
   '<div class="mb-3">'+
    ' <input type="number" class="form-control" id="phone" name="phone" placeholder="Mobile No" required>'+
    ' <div class="invalid-feedback">'+
     '  Please enter your mobile phone.'+
    ' </div>'+
   '</div>'+
   '<div class="mb-3">'+
    ' <textarea class="form-control" id="message" id="message" name="message" placeholder="Message" required rows="3"></textarea>'+
     '<div class="invalid-feedback">'+
      ' Please write your message.'+
     '</div>'+
     '<button type="button" id="btn-contact" onclick="contactMe()" class="btn float-end btn-contact">Submit</button>'+
   '</div>';
}