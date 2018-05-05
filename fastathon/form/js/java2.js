const inputLocationEdu = document.getElementById('eduDir');
const inputLocationExper = document.getElementById('experiansDir');
const inputLocationEpren = document.getElementById('entrepreneurshipDir');
const inputLocationVolun = document.getElementById('volunteeringDir');
const educationForm = prepareForm('educationForm');
const experienceForm = prepareForm('experienceForm');
const entrepreneurshipForm = prepareForm('entrepreneurshipForm');
const volunteeringForm = prepareForm('volunteeringForm');

const payload = {
    education: [],
    experience: [],
    entrepreneurship: [],
    volunteering: [],
    final: [],
    consider: []
  };

const limits = {
  'education': 3,
  'experience': 3,
  'entrepreneurship': 3,
  'volunteering': 3
};

add('education');
add('experience');
add('entrepreneurship');
add('volunteering');

function add(type) {
  
  if ( typeof limits[type] == "number" ) {
    if ( limits[type] <= 0 ) return alert('Not Allowed');
    limits[type]--;
  }

  switch ( type ) {
    case 'education': {
     inputLocationEdu.appendChild(educationForm.cloneNode(true));
     break;
    }
    case 'experience': {
     inputLocationExper.appendChild(experienceForm.cloneNode(true));
      break;
    }
    case 'entrepreneurship': {
     inputLocationEpren.appendChild(entrepreneurshipForm.cloneNode(true));
      break;
    }
    case 'volunteering': {
     inputLocationVolun.appendChild(volunteeringForm.cloneNode(true));
      break;
    }
  }
}

function parseForm(form) {
  const values = {};
  const items = $(form).serializeArray();
  //console.log(items);
  let isError = false;

  for ( let i in items ) {
    let item = items[i];
    //console.log(item);
    if ( form[item.name].checkValidity && !form[item.name].checkValidity()) {
      isError = true;
      $(form[item.name]).addClass('error');
      $(form[item.name])[0].scrollIntoView({
        behavior: "smooth", // or "auto" or "instant"
        block: "end" // or "end"
      });
      if (document.getElementById('hidden').className=='error') {
           $('.chekerr').css("color","red");
      }
      else{
           $('.chekerr').css("color","rgba(8, 46, 117, 0.78)"); 

      }
    }
    else{
      $(form[item.name]).removeClass('error');
    }

      if ( item.name = item.name.replace('[]', '') ) {

        if ( !values[item.name] ) values[item.name] = [];

        values[item.name].push(item.value);  ;
      } else {
        values[item.name] = item.value;
      }
    
  }

  if ( isError ) {
    return false;
  }

  return values;
}

function apply() { 

  const elements = document.getElementsByTagName('form');
  
    for ( var i in elements ) {
        if ( typeof elements[i] == "object" ) {
            const formName = elements[i].getAttribute('name');
            const data = parseForm(elements[i]);
            if ( !data ) return;

            switch ( formName ) {
                case "education": {
                  var key;
                  if (limits['education']==2) {
                    key=0;
                  }
                  if (limits['education']==1) {
                    key=1;
                  }                  
                  if (limits['education']==0) {
                    key=2;
                  }
                    payload.education[key]=data;
                    //document.getElementsByName("education")[key].setAttribute("class", "democlass");
                    //document.getElementsByName("education")[key].getElementsByTagName("input").setAttribute("disabled", "disabled");
                    break;
                }
                case "experience": {

                  var key;
                  if (limits['experience']==2) {
                    key=0;
                  }
                  if (limits['experience']==1) {
                    key=1;
                  }                  
                  if (limits['experience']==0) {
                    key=2;
                  }
                    payload.experience[key]=data;
                    
                    break;
                }
                case "entrepreneurship": {
                  var key;
                  if (limits['entrepreneurship']==2) {
                    key=0;
                  }
                  if (limits['entrepreneurship']==1) {
                    key=1;
                  }                  
                  if (limits['entrepreneurship']==0) {
                    key=2;
                  }
                    payload.entrepreneurship[key]=data;
                    break;
                }
                case "volunteering": {
                  var key;
                  if (limits['volunteering']==2) {
                    key=0;
                  }
                  if (limits['volunteering']==1) {
                    key=1;
                  }                  
                  if (limits['volunteering']==0) {
                    key=2;
                  }
                    payload.volunteering[key]=data;
                    break;
                }
                case "final": {
                    payload.final = data;
                    break;
                }                
                case "consider": {
                    payload.consider=(data);
                    break;
                }
            }
        }
    }

    $.ajax({
        url: "index.php",
        type: "POST",
        data: JSON.stringify(payload),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function(data, status){
            console.log(data, status);
        }
    });

    document.getElementById('rakStartupsForm').style.display='none';
    document.getElementById('congraulation').style.display='flex';
    $('#congraulation').click(function() {
      location.reload();
    });


}

function prepareForm(id) {
  const target = document.getElementById(id);
  const node = target.cloneNode(true);
  node.removeAttribute("id");
  target.remove();
  return node;
}


$('.checkOne').on('change', function() {
   if($('.checkOne:checked').length > 3) {
       this.checked = false;
   }});

function closeForm(type, instance) {
  if (limits[type]!=2) {
    if ( limits[type] );
    $(instance).closest('form').remove();
    limits[type]++;    
  }
}

var click=1;
function agreei(){
 if(click==1){
  document.getElementsByClassName("sendForm")[0].addEventListener("click", apply);
  $('.sendForm').removeAttr('id');
  click++;
 }
 else{
  document.getElementsByClassName("sendForm")[0].removeEventListener("click", apply);
  $('.sendForm').attr('id', 'sendForm2');
  click--;
 }
}


$('.checkOne').on('change', function() {
   if($('.checkOne:checked').length > 0) {
      document.getElementById('hidden').value ='text';
   }
    else{
      document.getElementById('hidden').value ='';
    }
 });
