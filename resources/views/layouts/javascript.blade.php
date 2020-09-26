function checkEmail()
{
    var useremail = $('#emailaddress').val();
    if(useremail != '')
    {
        $.ajax({
        url: "{{url('checkDuplicate')}}",
        type: "post",
        data: { 'column_name' : 'email','value' : useremail,'_token': '{{ csrf_token() }}'},
        success: function(data)
        {
            if(data.status == 1)
            {
                $("#emailaddress").css("background-color", "#FA8072");
                $('#small_email').html("Email already exist !!");
                $('#submit_button').css("pointer-events","none");
            }
            if(data.status == 2)
            {
                $("#emailaddress").css("background-color", "#fff");
                $('#small_email').html("");
                $('#submit_button').css("pointer-events","auto");
            }
        }
        });
    }
}

function checkContact()
{
    var usercontact = $('#contact').val();
    if(usercontact != '')
    {
        $.ajax({
        url: "{{url('checkDuplicate')}}",
        type: "post",
        data: { 'column_name' : 'contact','value' : usercontact,'_token': '{{ csrf_token() }}'},
        success: function(data)
        {
            if(data.status == 1)
            {
                $("#contact").css("background-color", "#FA8072");
                $('#small_contact').html("Contact already exist !!");
                $('#submit_button').css("pointer-events","none");
            }
            if(data.status == 2)
            {
                $("#contact").css("background-color", "#fff");
                $('#small_contact').html("");
                $('#submit_button').css("pointer-events","auto");
            }
        }
        });
    }
}


