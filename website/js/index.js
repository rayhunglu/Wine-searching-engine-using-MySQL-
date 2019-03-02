// $(function(){$("#WineInformation").keyup(function(e){if(e.keyCode==13){ajax();}});$("#button").click(function(){ajax();});
// function ajax(){var val1=$("#WineInformation1").val(),buttonmsg='search';var e1 = document.getElementById("customselect1");var strUser1 = e1.options[e1.selectedIndex].value;var val2=$("#WineInformation2").val(),buttonmsg='search';var e2 = document.getElementById("customselect2");var strUser2 = e2.options[e2.selectedIndex].value;
// $.ajax({type:"GET",url:"../index.php",data:{WineInformation1:val1,select1:strUser1,WineInformation2:val2,select2:strUser2},beforeSend:function(){$("#button").attr("disabled",true),$("#msg").hide(),$("#button").html("Searching.....");},success:function(a){$("button").attr("disabled",false),$("#button").html(buttonmsg),$("#msg").slideDown(),$("#msg").html(a);},error:function(a){$("button").attr("disabled",false),$("#button").html(buttonmsg),alert("Failed");}});}});

$(function(){$("#WineInformation").keyup(function(e){if(e.keyCode==13){ajax();}});$("#button").click(function(){ajax();});
function ajax(){var val1=$("#WineInformation1").val(),buttonmsg='search';var e1 = document.getElementById("customselect1");var strUser1 = e1.options[e1.selectedIndex].value;
$.ajax({type:"GET",url:"../test/index.php",data:{WineInformation1:val1,select1:strUser1},beforeSend:function(){$("#button").attr("disabled",true),$("#msg").hide(),$("#button").html("Searching.....");},success:function(a){$("button").attr("disabled",false),$("#button").html(buttonmsg),$("#msg").slideDown(),$("#msg").html(a);},error:function(a){$("button").attr("disabled",false),$("#button").html(buttonmsg),alert("Failed");}});}});

$(document).ready(function() {
    var max_fields      = 3;
    var wrapper         = $(".container2");
    var add_button      = $(".add_form_field");
    var x = 1;
    $(add_button).click(function(e){
        e.preventDefault();
        if(x < max_fields){
            x++;
            $(wrapper).append('<span><select id="customselect1"><option value="country">country</option><option value="region">region</option><option value="points">points</option><option value="province">province</option></select></span><input class="form-control" id="WineInformation1" placeholder="Wine Information" type="text" /><span><a href="#" class="delete">Delete</a></span></div>'); //add input box
        }
  else
  {
  alert('You Reached the limits')
  }
    });
  
    $(wrapper).on("click",".delete", function(e){
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});