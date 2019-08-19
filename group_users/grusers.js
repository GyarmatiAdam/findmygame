$(document).ready(function() {
    // alert("Hello");

    var groupID = 

    // get group members after loading the page
    // $.ajax({
    //     url: 'a_get_grusers.php',
    //     type: 'POST',
    //     data: {},
    //     success: function(response){
    //         $(#).html(response);
    //     }

    // });


    // delete a group user (set status to removed)
    $('.delete').click(function() {
        var element = this;
        var id = element.id;

        var splitid = id.split("_");
        var groupID = splitid[0];
        var userID = splitid[1];

        // Delete id
        var deleteid = userID;

        // AJAX Request
        $.ajax({
            url: 'a_del_gruser.php',
            type: 'POST',
            data: { id: deleteid, group: groupID },
            success: function(response) {

                if (response == 1) {
                    // Remove element from HTML Table
                    $(element).closest('.box').fadeOut(600, function() {
                        $(this).remove();
                    });
                } else {
                    alert('Invalid ID.');
                }

            }
        });

    });

    // load user info into form in grusers_add.php (for control purpose)
    $('.keyup').keyup(function() {
        var element = this;
        var userID = element.value;        
        

        
        // AJAX Request
        $.ajax({
            url: 'a_load_user.php',
            type: 'POST',
            data: { id: userID },
            success: function(response) {

                if (response == 0) {
                    alert('Wrong ID.');
                } else {                    
                    // Display data
                    var userinfo = response;
                    var splitinfo = userinfo.split("_");

                    var username = splitinfo[0];
                    var usermail = splitinfo[1];

                    // console.log(username);
                    // console.log(usermail);                    

                    $(element).closest('.checkName').html(username);
                    $(element).closest('.checkMail').html(usermail);
                }

            }
        });

    });

    // add a user to a group (set status to verified)
    $('.add').click(function() {
        
        var userID = $('#userID').html();
        var role = $('#role option:selected').html();
        var status = $('#status option:selected').html();

        console.log(userID);
        console.log(role);
        console.log(status);

        //AJAX Request
        $.ajax({
            url: 'a_add_user.php',
            type: 'POST',
            data: { userID: userID, role: role, status: status },
            success: function(response) {

                if (response == 1) {
                    // Remove element from HTML Table
                    $(element).closest('.box').fadeOut(600, function() {
                        $(this).remove();
                    });
                } else {
                    alert('Invalid ID.');
                }

            }
        });

    });


    // application of a user to a group (create group user in table grusers)
    // $('.apply').click(function() {
    //     
             
    //     // console.log(userID);

    //     // AJAX Request
    //     $.ajax({
    //         url: 'a_apply_user.php',
    //         type: 'POST',
    //         data: { userID: userID },
    //         success: function(response) {

    //             if (response == 0) {
    //                 alert('Wrong ID.');
    //             } else {                    
    //                 // Display success message
    //                 $('#success')html('Your application was sent successfully.')

                    
    //             }
    //         }
    //     });

    // });





});