/* global data */

//force secure version of site
if (location.protocol !== 'https:') {
    location.replace(`https:${location.href.substring(location.protocol.length)}`);
}
(function($) {
jQuery(window).on('load', function() {
    var home = data.home,
        login_url = data.login_url,
        signup_url = data.signup_url;

    //dashboard
    enable_dashboard(data);
    
    //enable login/signup page
    enable_login(login_url, home);
    enable_signup(signup_url);
});

function enable_dashboard(data){
    if($('.control_panel')){
        var home = data.home,
            section = home+'/pages/sections/';

        $('#sidebar-toggler').on('click',function(e){
            e.preventDefault();
            $('#sidebar').toggleClass('shrink show'); 
        });
        load_section(section, 'profile', data);//default page
        load_links(data);

        $('#footer_copy').html('RichCo Property Solutions &copy;'+new Date().getFullYear());
    }
}
function load_links(data){
    var type    = data.type;
    
    if(type === 'admin'){
        $('#link_1').html('<i class="far fa-user fa-2x mr-3 text-gray"></i><span>Users</span>');
        $('#link_2').html('<i class="far fa-envelope fa-2x mr-3 text-gray"></i><span>Manage Email</span>');
    }
    
    $('#link_3').html('<i class="far fa-comment-dots fa-2x mr-3 text-gray"></i><span>Messages</span>');
    $('#link_4').html('<i class="far fa-file-alt fa-2x mr-3 text-gray"></i><span>Documents</span>');
        
    get_all_messages(data);
}

function load_link_handlers(data){
    var home    = data.home,
        section = home+'/pages/sections/';
    ////console.log('data: '+JSON.stringify(data));
    $('#home_link').on('click',function(e){
        e.preventDefault();
        add_active($(this));
        load_section(section, 'profile',data);
     });
    $('#link_1').on('click',function(e){
       e.preventDefault();
       add_active($(this));
       load_section(section, 'users', data);
    });
    $('#link_2').on('click',function(e){
       e.preventDefault();
       add_active($(this));
       load_section(section, 'email', data);
    });
    $('#link_3, #view_all_messages, #new_messages').on('click',function(e){
       e.preventDefault();
       add_active($(this));
       load_section(section, 'message', data);
    });
    $('#link_4').on('click',function(e){
       e.preventDefault();
       add_active($(this));
       load_section(section, 'documents', data);
    });
    $('#link_5, #logout_alt').on('click',function(e){
       e.preventDefault();
       add_active($(this));   
        var signout_url = data.signout_url;
       $.get('../wp-content/themes/richco/workers/signout.php',{},function(){
           window.location = '../admin';
       });
    });
    load_notifications(data);
}
function load_notifications(data){
    var messages = data.messages,
        count = 0,
        email = data.email,
        nonviewed_messages = new Array(),
        work_orders = data.all_work_orders,
        message_notification = '<span class="notify" id="message_notification_message"></span>',
        notify_notification = '<span class="notify" id="notify_notification"></span>';

    for(var i =0; i < messages.length; i++){
        if(messages[i].reciever_email === email){
            if(parseInt(messages[i].viewed) === 0){
                nonviewed_messages[count] = messages[i];
                count++;
            }
        }
    }
    if(count > 0){
        if(count > 1){
            $('#new_messages').html('You have '+count+' new messages.');
            $('#message_notify').append(message_notification);
        }else if(count === 1){
            $('#new_messages').html('You have '+count+' new message.');
            $('#message_notify').append(message_notification);
        }
    }else{
        $('#new_messages').html('No new messages');
        if($('#message_notification_message')){$('#message_notification_message').remove();}
    }
    if(data.type === 'admin'){
        var count = 0;
        for(var i = 0; i< work_orders.length; i++){
            if(work_orders[i].viewed === 0){
                count++;
            }
        }
        if(count > 0){
            $('#new_notifications').html('You have '+count+' unseen work orders.');
            $('#notifications').append(notify_notification);
        }else{
            $('#notify_notification').remove();
        }
    }
}
/*
 * 
 * @param array data - work_id, id, email, user_path, comments, details, email_alt, status, date, address, folder, company
 */
function load_order_data(data){
    var original = data;
    var data = data.work_order;
    console.log('work order data: '+JSON.stringify(data));
    var date = new Date(data.date);
    $('.date').html(format_normal_date(date));
    $('#details').html(data.details);
    $('#comments').html(data.comments);
    if(data.status !== null)$('#status').html(data.status);
    else $('#status').html('initiated');
    $('#name').html(data.name);
    $('#business').html(data.company);
    $('#address').html(data.address.replace('.','.<br/>').replace('street','street<br/>'));
    $('#work_id').html('Work Order '+data.work_id);
    data = original;
    load_work_order_docs_pics(data);
    add_work_order_detail_handlers(data);
    load_work_order_details_save_btn_handler(data);
    populate_work_orders_todo(data);
}
function add_work_order_detail_handlers(data){
    var original = data,
        upload_file_url = data.upload_file_url,
        data = data.work_order,
        folder = parseInt(data.folder.replace('/docs/',""));
    
    $('.upload_doc, .upload_photo').on('click', function(){
        $('#work_order_file').click();
    });
    $('#work_order_file').change(function(){
        var fd = new FormData();
        var files = $('#work_order_file')[0].files[0];
        fd.append(folder,files);
        upload_work_order_docs(fd, upload_file_url);
    });
     $('.upload-area-work').on('drop', function (e) {
        e.stopPropagation();
        e.preventDefault();
        var file = e.originalEvent.dataTransfer.files;
        var fd = new FormData();
        fd.append(folder, file[0]);
        upload_work_order_docs(fd, upload_file_url);
    });
    data = original;
    $('#add_todo').on('click',function(){
        var num = 1;
        $('#todo tbody tr td.num').each(function(){
            var text = $(this).text();
            console.log('text: '+text);
            if(parseInt(text) >= num){num = parseInt(text)+1;}
        });
        var list_item = '<tr><td conteditable="false" class="num">';
        list_item += num;
        list_item += '</td><td class="desc" contenteditable="true">Description</td><td class="stat" contenteditable="true">';
        list_item += 'status';
        list_item += '</td></tr>';
        $('#todo tbody').append(list_item); 
        $('.stat').on('click',function(){
           if($(this).text() === 'status'){$(this).text('');}
        }); 
        $('.desc').on('click',function(){
           if($(this).text() === 'Description'){$(this).text('');}
        });
    });
}
function load_work_order_docs_pics(data){
    var original = data, home = data.home;
    var folder = data.work_order.folder;
    //console.log('folder: '+folder);
    var f_data = {
        'folder':folder
    };
    $.post(home+'/workers/get_work_order_docs.php', f_data, function(result){
        console.log('result: '+JSON.stringify(result));
        if(result.docs.length > 0){
            load_work_order_docs(result.docs, data);
            //console.log('docs: '+result.docs);
        }
        if(result.pics.length > 0){
            load_work_order_pics(result.pics, data);
            //console.log('pics: '+result.pics);
        }
    },'JSON');
}
function load_work_order_docs(docs_data, data){
    var folder = data.work_order.folder,
        home = data.home;
    for(var i=0; i < docs_data.length; i++){
        var html = '<div class="col-3 order_doc">';
        html += '<i class="far fa-file-word fa-5x"></i><br /><a href="../wp-content/themes/richco/'+ folder+'/'+docs_data[i] +'" class="">'+docs_data[i]+'</a>';
        html += '<p class="remove_client_document" data-loc="'+ folder+'/'+docs_data[i] +'"><i class="fa fa-minus-circle"></i></p>';
        html += '</div>';
        $('#work_order_documents').append(html);
        set_remove_work_order_docs_pics_click_event();
    }
}
function load_work_order_pics(pics_data, data){
    var folder = data.work_order.folder,
        home = data.home;
    for(var i=0; i < pics_data.length; i++){
        var html = '<div class="col-3 work_order_client_photo">';
        html += '<img src="../wp-content/themes/richco/'+ folder+'/pics/'+pics_data[i] +'" class="img-fluid"/>';
        html += '<p class="remove_client_photo" data-loc="'+ folder+'/pics/'+pics_data[i] +'"><i class="fa fa-minus-circle"></i></p>';
        html += '</div>';
        $('#work_order_photos').append(html);
        set_remove_work_order_docs_pics_click_event();
    }
}
function set_remove_work_order_docs_pics_click_event(){
    $('.remove_client_photo, .remove_client_document').on('click',function(){
        console.log('click');
        var folder = $(this).data('loc');
        $(this).parent().remove();
        var delete_data = {'folder':folder};
        $.post('../wp-content/themes/richco/workers/delete_work_order_docs.php', delete_data, function(response){
            console.log(response.msg);
        },'JSON');
    });
}
function load_work_order_details_save_btn_handler(data){
    var folder = data.work_order.folder,
        id = data.work_order.id,
        home = data.home;
    $('#work_order_save').on('click',function(){
        console.log('click');
        var details = $('#details').text(),
            comments = $('#comments').text(),
            status = $('#status').text(),
            todo_array = '';
        if($('#todo tbody tr').length){
            todo_array = JSON.stringify( get_work_order_todo_list_array() );
        }
        var final ={
            'id':id,
            'details':details,
            'comments':comments,
            'status':status,
            'todo_array':todo_array
        };
        $.post(home+'/workers/save_work_order_details.php', final, function(response){
            console.log('response: '+response);
            var output = response.msg;
            $('#save_work_order_details_result').hide().html(output).slideDown(1000);
        },'JSON');
    });
}
function populate_work_orders_todo(data){
    var todo_array = data.work_order.todo,
        num = 1;
    if(todo_array !== null && todo_array !== undefined && todo_array.length > 0){
        todo_array = sort_work_array(JSON.parse(todo_array));
        for(var i = 0; i < todo_array.length; i++)
        {
            var desc = todo_array[i].desc,
                stat = todo_array[i].stat,
                num = todo_array[i].num,
            list_item = '<tr><td conteditable="false" class="num">';
            list_item += num;
            list_item += '</td><td class="desc" contenteditable="true">'+desc+'</td><td class="stat" contenteditable="true">';
            list_item += stat;
            list_item += '</td></tr>';
            $('#todo tbody').append(list_item);         
            num++;
        }
    }
}
function get_work_order_todo_list_array(){
    var itemsArray = new Array();//initialize
    //iterate rows in all tables!
    $('#todo tbody tr').each(function(row, tr){
            //make a giant array
            itemsArray[row]={
                    "num" : $(tr).find('.num').text(),
                    "desc" : $(tr).find('.desc').text(),
                    "stat" : $(tr).find('.stat').text()
            };
    }); 
    return itemsArray;//final array
}
function load_section(link, section, section_data){
    link = link+section+'.php';
    $('#sections').html('');
    $('#sections').load(link,function(){
        if(section === 'profile'){//load profile section data
            load_profile_section_handlers(section_data);
        }else if(section === 'message'){
             load_message_section_handlers(section_data);
        }else if(section === 'documents'){
            load_documents_section_handlers(section_data);
        }else if(section === 'email'){
            populate_emails_table(section_data);
        }else if(section === 'users'){
            populate_users_table(section_data);
        }else if(section === 'work_order_template'){
            load_order_data(section_data);
        }
        setTimeout(function(){
            if($('#section-loader').hasClass('show')){$('#section-loader').removeClass('show');}
            //console.log(section+' section loaded.');
        },2000);
    });
}           
function load_documents_section_handlers(data){
    var home = data.home,
            section = home+'/pages/sections/',
            add_work_url = data.add_work_url,
            upload_file_url = data.upload_file_url,
            timestamp = $.now();
    
    
    if(data.type === 'admin'){
        $('#documents_table thead tr').prepend('<th>Client Email</th>');
        $('#work_new tr').prepend('<td id="work_email"></td>');
        $('#work_current thead tr').prepend('<th>Client Email</th>');
        $('#all_work_orders').prepend('<td></td>');
    }
    
    // preventing page from redirecting
     $("html").on("drop", function(e) { e.preventDefault(); e.stopPropagation(); });
     $("html").on("dragover", function(e) {
        e.preventDefault();
        e.stopPropagation();
        $("#upload_file_text").text("Here");
     });
     // Drag over
    $('.upload-area').on('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $("#upload_file_text").text("Drop");
    });
    // Drop
    $('.upload-area').on('drop', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $("#upload_file_text").text("Upload...");
        var file = e.originalEvent.dataTransfer.files;
        var fd = new FormData();
        fd.append(timestamp, file[0]);
        upload_work_order_docs(fd, upload_file_url);
    });
    // Open file selector on div click
    $("#uploadfile, #work_photos").click(function(){
        $("#file").click();
    });
    // file selected
    $("#file").change(function(){
        var fd = new FormData();
        var files = $('#file')[0].files[0];
        fd.append(timestamp,files);
        upload_work_order_docs(fd, upload_file_url);
    });
    $('#work_new td').on('click',function(){
        if($('#add_work_result p').hasClass('alert')){
            $('#add_work_result p').slideUp(1000,function(){
                $('#add_work_result p').remove();
            });
        }
    });
    $('#add_work').on('click',function(){
        var id = $('#work_id').text(),
            details = $('#work_details').text(),
            comments = $('#work_comments').text(),
            error = false, output = 'Error', date = new Date(),
            email = data.email;
        if(data.type === 'admin'){
            email = $('#work_email').text();
            var users = data.users, email_exists = false;
            for(var i = 0; i< users.length; i++){
                var this_email = users[i].email;
                if(this_email === email){
                    email_exists = true;
                }
            }
            if(!email_exists){
                output = 'Client Email address not found. You can add clients using the users tab to the left.';
                error = true;
            }
        }
        if($.trim(id).length < 3){
            output = 'You must give this work order an identifying name greater than 3 characters (work ID)';
            error = true;
        }
        $('#add_work_result').html(' ');
        if(!error){
            console.log('no error');
            if(timestamp === null){timestamp = $.now();}
            var work_data = {
                'id':id,
                'details':details,
                'comments':comments,
                'email':email,
                'date':date,
                'timestamp':timestamp
            };
            $.post(add_work_url, work_data, function(response){
                console.log('response:');
                console.log(response);
                output = response.msg;
                if(response.error === 0){
                    var all_work_orders = response.all_work_orders;
                    console.log('all_work_orders: '+all_work_orders);
                    populate_work_orders_table(all_work_orders, data);
                }
                $('#add_work_result').hide().html(output).slideDown(1000);
            },'JSON');
        }else{
            $('#add_work_result').hide().html('<p class="alert alert-danger">'+output+'</p>').slideDown(1000);
        }
    });
    get_work_data(data);
    if(data.type === 'admin'){
        var count = 0;
        if(data.all_work_orders != undefined){
            for(var i = 0; i< data.all_work_orders.length; i++){
                if(data.all_work_orders[i].viewed === 0){
                    count++;
                    var thingy = {'id':data.all_work_orders[i].id};
                    $.post('../wp-content/themes/richco/workers/mark_work_order_seen.php', thingy, function(response){
                        data.all_work_orders = response.all_work_orders;
                    },'JSON');
                }
            }
            if(count > 0){
                $('#new_notifications').html('You have no notifications.');
                $('#notify_notification').remove();
            }
        }
    }
}
function get_work_data(data){
    var get_work = data.get_work;

    $.post(get_work, {'email':data.email}, function(result){
        if(!result.error){
            populate_work_orders_table(result.all_work_orders, data);
        }else{
            console.log('error - line 186 getting work orders');
        }
    },'JSON');
}
function populate_work_orders_table(all_work_orders, data){
    if(all_work_orders.length){$('#all_work_orders').html('');}
    for(var i = 0; i< all_work_orders.length; i++){
        var work_id = all_work_orders[i].work_id,
            comments = all_work_orders[i].comments,
            details = all_work_orders[i].details,
            id = all_work_orders[i].id,
            email = all_work_orders[i].email,
            email_alt = all_work_orders[i].email_alt,
            status = all_work_orders[i].email_alt,
            date = all_work_orders[i].email_alt,
            todo = all_work_orders[i].todo,
            data_string = '<tr>';
    if(data.type === 'admin'){data_string += '<td>'+email+'</td>';}
            data_string += '<td>'+work_id+'</td><td>'+comments+'</td><td>'+details+'</td>';
            data_string +='<td class="remove text-center" contenteditable="false"><button class="btn btn-outline-green btn-sm remove_user open_work" ';
            data_string += 'data-id="'+id+'" ';
            data_string += '>Open</button></td>data-email="'+email+'">Open</button></td>';
            data_string +='<td class="remove text-center" contenteditable="false"><button class="btn btn-outline-green btn-sm remove_user remove_work" data-id="'+id+'">Remove</button></td>';
            data_string +='</tr>';
            $('#all_work_orders').append(data_string);
    }
    load_work_orders_table_handlers(all_work_orders, data);
    
    $('#remove_nothing').on( 'click', function(){
       $(this).parent().parent().remove(); 
       console.log('click');
    });
    $('.remove_work').on('click',function(){
        var id = parseInt($(this).data('id')),
            home = data.home;
        $(this).parent().parent().remove();
        $.post(home+'/workers/remove_work_order.php', {'id':id}, function(response){
            console.log('remove_work_order response: '+response.msg);
        },'JSON'); 
    });
}
function load_work_orders_table_handlers(all_work_orders, data){
    $('.open_work').on('click',function(e){
        e.preventDefault();
        var home = data.home,
            section = home+'/pages/sections/',
            id = $(this).data('id'),
            user_path, email, work_id, comments, details, email_alt, status, //work_orders data
            users = data.users, address, company, date, folder, todo, name;//user data
        for( var i =0; i<all_work_orders.length;i++){
            if(parseInt(all_work_orders[i].id) === parseInt(id)){
                work_id = all_work_orders[i].work_id;
                email = all_work_orders[i].email;
                user_path = home+'/docs/'+email+'/';
                comments = all_work_orders[i].comments;
                details = all_work_orders[i].details;
                email_alt = all_work_orders[i].email_alt;
                status = all_work_orders[i].status;
                date = all_work_orders[i].date;
                todo = all_work_orders[i].todo;
                folder = all_work_orders[i].folder;
            }
        }
        for( var i =0; i<users.length;i++){
            if(users[i].email === email){
                name = users[i].name;
                address = users[i].address;
                company = users[i].company;
            }
        }
        var work_orders_data = {
            'name':name,
            'work_id':work_id,
            'id':id,
            'email':email,
            'user_path':user_path,
            'comments':comments,
            'details':details,
            'email_alt':email_alt,
            'status':status,
            'date':date,
            'address':address,
            'folder':folder,
            'todo':todo,
            'company':company
        };
        data.work_order = work_orders_data;
        load_section(section,'work_order_template',data);
    });
}
function upload_work_order_docs(fd, upload_file_url){
    $.ajax({
        url: upload_file_url,
        type: 'post',
        data: fd,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(data){
            console.log('response: '+JSON.stringify(data));
            var output = data.msg;
            if(data.error){
                if(data.msg !== 'null'){
                    output = "<p class='alert alert-danger'>"+output+"</p>";
                }else{output = '';}
            }else{
                output = "<p class='alert alert-info'>"+output+"</p>";
                if(data.is_img){
                    addThumbnail(data);
                }else{
                    addDocument(data);
                }
            }
            $('#result').hide().html(output).slideDown(1000);
        },
        error: function (e){
            console.log('error: '+JSON.stringify(e));
            $('#result').hide().html(e).slideDown(1000);
        }
    });
    
}
function addDocument(result_data){
    var src = result_data.src,
        name = result_data.name;

    if(!$('.work_order_row').length){
        var num = parseInt($("#upload_file_text").text())+1;
        if(isNaN(num)){num = 1;}
        $("#upload_file_text").html(num+' <i class="fa fa-2x fa-file-word"></i>');
    }else{
        var html = '<div class="col-3 order_doc">';
        html += '<i class="far fa-file-word fa-5x"></i><br /><a href="../wp-content/themes/richco'+ src +'" class="">'+name+'</a>';
        html += '<p class="remove_client_document" data-loc="'+ src +'"><i class="fa fa-minus-circle"></i></p>';
        html += '</div>';
        $('#work_order_documents').append(html);
        set_remove_work_order_docs_pics_click_event();//reset click event
    }
}
// Added thumbnail
function addThumbnail(result_data){
    var src = result_data.src;
    if(!$('.work_order_row').length){
        $('#work_upload_photo').attr('src','../wp-content/themes/richco'+src);
    }else{
        var html = '<div class="col-3 work_order_client_photo">';
        html += '<img src="../wp-content/themes/richco'+src+'" class="img-fluid"/>';
        html += '<p class="remove_client_photo" data-loc="'+ src +'"><i class="fa fa-minus-circle"></i></p>';
        html += '</div>';
        $('#work_order_photos').append(html);
        set_remove_work_order_docs_pics_click_event();//reset click evnt
    }
}

// Bytes conversion
function convertSize(size) {
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (size === 0) return '0 Bytes';
    var i = parseInt(Math.floor(Math.log(size) / Math.log(1024)));
    return Math.round(size / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

function get_all_messages(data){
    var get_messges_url = data.get_messges_url;
    $.get( get_messges_url, function( messages ) {
        data.messages = messages;
        load_link_handlers(data);
    },'JSON');
}
function load_users_container(data){
    var users_container = $('#users_container'),
        users = data.users,
        messages = data.messages;
        if(messages === null || messages === undefined){messages = data.messages;}
        if(messages === null || messages === undefined){messages = {};}        
        //clear container 
        $(users_container).html('');var count = 0;
        //sender_email, reciever_email, message, date
        for (var i = 0; i < users.length; i++) {
            var user = users[i];
            var user_name = user.name,
                user_email = user.email,
                user_pic = user.pic,
                users_messages = [],
                sent_messages = [],
                recieved_messages = [];
        
            if(user_pic === undefined || user_pic === "" || user_pic === null){
                user_pic = 'avatar.png';
            }
            if(data.name !== user_name){//ignore yourself
                if(user_name.length > 2){count++;}
                for (var j = 0; j < messages.length; j++) {//iterate all messages for a match
                    var message = messages[j];
                    var sender_email = message.sender_email,
                        reciever_email = message.reciever_email;
                    if(sender_email === data.email || reciever_email === data.email){//messages to or from this user
                        if(sender_email === user_email || reciever_email === user_email){//messages to or from me
                               if(sender_email === user_email){ //sent from this user
                                    sent_messages.push(message);
                               }else{                           //recieved by this user
                                    recieved_messages.push(message);//pushing entire object here
                               }
                        }
                    }
                }//end for loop - messages{}
                //prefer last sent messages
                var chat_date = new Date(), chat_message_preview = '',has_unseen_message = false;
                if( !$.isEmptyObject(recieved_messages[recieved_messages.length-1]) ){//have recieved
                    chat_message_preview = recieved_messages[recieved_messages.length-1].message.substring(0, 25)+'...';
                    chat_date = new Date(recieved_messages[recieved_messages.length-1].date);
                }
               if( !$.isEmptyObject(sent_messages[sent_messages.length-1]) ){//have sent
                   //console.log('line 595 sent_messages[sent_messages.length-1]: '+JSON.stringify(sent_messages[sent_messages.length-1]));
                   //use newer message
                        chat_message_preview = sent_messages[sent_messages.length-1].message.substring(0, 25)+'...';
                        chat_date = new Date(sent_messages[sent_messages.length-1].date);
                        for(var w = 0; w < sent_messages.length; w++){
                            if(parseInt(sent_messages[w].viewed) === 0){
                                has_unseen_message = true;
                            }
                        }
                }
                var funkyClass = '';
                if(has_unseen_message === true){funkyClass = ' super-bold';}//set first active
                if(chat_message_preview.length < 1){chat_message_preview = 'no messages...';}
                //console.log('count: '+count);
                //console.log('chat_date: '+chat_date);
                //we have the messages, lets add the html to make the user visible
                var user_html = '<div class="chat_list ';
                    if(count === 1){user_html += 'active_chat';}//set first active
                    user_html += '" data-user-id="'+user.id;
                    user_html += '" data-user-email="'+user_email;
                    user_html += '" data-user-name="'+user_name;
                    user_html += '" ><div class="chat_people"><div class="chat_img"> <img class="rounded-circle" src="';
                    user_html += data.home+'/images/'+user_pic;
                    user_html += '" alt="sunil"> </div>';
                    user_html += '<div class="chat_ib"><h5>';
                    user_html += user_name; 
                    user_html += '<span class="chat_date'+funkyClass+'">';
                    user_html += chat_date.toDateString();
                    user_html += '</span></h5> <p>';
                    user_html += '</span></h5> <p class="'+funkyClass+'">';
                    user_html += chat_message_preview;
                    user_html +='</p> </div> </div> </div>';
                $(users_container).append(user_html);

            users_messages = {
                    'sent_messages':sent_messages,
                    'recieved_messages':recieved_messages,
                    'user':user
                };   
            }//end if - not me

            /*** access user_messages here ***/
            
        }//end users
        //activate search bar 
        $('.search-bar').on('keyup',function(){
            var search = $(this).val();
            $('.chat_list').each(function(){
                if($(this).data('user-name').toLowerCase().includes(search.toLowerCase())){
                    if($(this).hasClass('hidden')){$(this).removeClass('hidden');}
                }else{$(this).addClass('hidden');}
            });
        });
        
        $('.chat_list').each(function(){
            if($(this).hasClass('active_chat')){
                if($(this).find('super-bold')){
                    $(this).find('super-bold').removeClass('super-bold');
                    clear_unseen_message_status(data, $(this).data('user-email'));
                }
            }
            $(this).on('click',function(){
                if($(this).hasClass(' super-bold')){
                    $(this).removeClass('super-bold');
                    clear_unseen_message_status(data, $(this).data('user-email'));
                }
                if($(this).find('super-bold')){
                    $(this).find('super-bold').removeClass('super-bold');
                    clear_unseen_message_status(data, $(this).data('user-email'));
                }
            });
        });
}//end load_users_container
function clear_unseen_message_status(data, user_email){
    var messages = data.messages;
    for(var i = 0; i < data.messages.length; i++){
        var message = data.messages[i];
        if(message.sender_email === user_email){
            if(parseInt(message.viewed) === 0){
                console.log('unviewed message data: '+JSON.stringify(message));
                data.messages[i].viewed = 1;
                var id = message.id,
                        home = data.home;
                $.post(home+'/workers/set_message_viewed.php', {'id':id}, function(response){
                    console.log('set to viewed: '+response);
                },'JSON');
            }
        }
    }
    load_notifications(data);
}
function sendMessage(data) {
    var message_text = $('#write_msg').val();//get message
    $('#write_msg').val('');//clear message
    /*
   //console.log('new message: '+message_text);
    //console.log('users_messages: '+JSON.stringify(users_messages));
    //console.log('data: '+JSON.stringify(data));
    //console.log('new message: '+message_text);
    */
    if($.trim(message_text) === '') {
            return false;
    }
    var user_email = $('#users_container .chat_list.active_chat').attr('data-user-email'),
    message_time = new Date(),//todays date/time
    message_time = addHours(message_time, 5),//adjust for UTC
    new_message_data = {'sender_email':data.email,'reciever_email':user_email,'message':message_text,'date':message_time},
    new_message = format_outgoing_message(new_message_data);//holds html
        
    //add message to container
    $('#mesgs .msg_history').append(new_message);
    scroll_to_last_msg();
    
    message_time = new Date(),//todays date/time - remove UTC
    new_message_data = {'sender_email':data.email,'reciever_email':user_email,'message':message_text,'date':message_time};
    //console.log('');
    
    send_message_url = data.send_message;//url for final post to db
    $.post( send_message_url, new_message_data, function( response ) {
        //console.log('message response: '+response.msg);
    },'JSON');
    message_time = addHours(message_time, 5);
        var new_message_data = {'sender_email':data.email,'reciever_email':user_email,'message':message_text,'date':message_time};

        data.messages[data.messages.length] = new_message_data;

    return data;
}
 function addHours(date, h) {
  date.setTime(date.getTime() + (h*60*60*1000));
  return date;
}
function scroll_to_last_msg(){
     var height_adjust = 0;
    $('.outgoing_msg').each(function(){
        height_adjust += $(this).height();
    });
    $('.incoming_msg').each(function(){
        height_adjust += $(this).height();
    });
    $("#mesgs .msg_history").animate({ scrollTop: height_adjust }, 1);
}
function format_outgoing_message(new_message_data){
    var message_text = new_message_data.message,
        message_time = new Date(new_message_data.date),
        new_message = '';
    new_message += '<div class="outgoing_msg"><div class="sent_msg"><p>';
    new_message += message_text;
    new_message += '</p><span class="time_date">';
    new_message += getTimeFromDate(message_time)+' | '+get_timeFrame(message_time);
    new_message += '</span> </div> </div>';
    return new_message;
}
function format_incoming_message(new_message_data){
    var message_text = new_message_data.message,
        message_time = new Date(new_message_data.date),
        new_message = '',
        picture_url = $('.active_chat .chat_img').find('img').attr('src');
        new_message += '<div class="incoming_msg"><div class="incoming_msg_img"> <img class="rounded-circle" src="';
        new_message += picture_url;
        new_message += '" alt=""> </div> <div class="received_msg"> <div class="received_withd_msg"><p>';
        new_message += message_text;
        new_message += '</p><span class="time_date">';
        new_message += getTimeFromDate(message_time)+' | '+get_timeFrame(message_time);
        new_message += '</span> </div> </div> </div>';
        return new_message;
}
function get_timeFrame(date){
    date = date - 18000000;
    var now = new Date(),
        date = new Date(date),
        dayNameNow = now.toString().split(' ')[0],
        dayNameDate = date.toString().split(' ')[0],
        timeframe = (now - (date)),
        day = 86400000,
        week = day*7,
        hour = 3600000,
        minute = 60000;
          //  console.log('dayNameNow: '+dayNameNow+' ' +'dayNameDate: '+dayNameDate+' timeframe:'+timeframe);

    if(timeframe < (minute*5) && timeframe >=  0){timeframe = 'Just Now';}
    else if(timeframe < hour-1){timeframe = (Math.round(timeframe/minute))+' Mins ago';}
    else if(timeframe === hour){timeframe = '1 Hour ago';}
    else if(timeframe < (day-1) && (Math.round(timeframe/hour) <= 10) && now.getDay() === date.getDay()){timeframe = (Math.round(timeframe/hour))+' Hours ago';}
    else if(timeframe < (day-1) && (Math.round(timeframe/hour) > 10) && now.getDay() === date.getDay()){timeframe = ' Today';}
    else if(timeframe < ((day*2)-1) && now.getDay()-1 === date.getDay()){timeframe = ' Yesterday';}
    else {timeframe = format_normal_date(date);}

    return timeframe;
}
function load_message_section_handlers(section_data){
    load_users_container(section_data);
    
    $('#msg_send').on('click',function() {
        section_data = sendMessage(section_data);
    });
    $('#write_msg').on('keyup',function(e){
        if(e.keyCode === 13)//enter key
        {
            section_data = sendMessage(section_data);
        }
    });
    $('.chat_list').click(function(){
        $('.chat_list').each(function(){
           if($(this).hasClass('active_chat')){$(this).removeClass('active_chat');} 
        });
        $(this).addClass('active_chat');
            var get_messges_url = section_data.get_messges_url;
            $.get( get_messges_url, function( messages ) {
               // console.log('messages: '+JSON.stringify(messages));
                section_data.messages = messages;
                load_active_user_messages(section_data);
            },'JSON');
    }); 
    
    load_active_user_messages(section_data);
}
function load_active_user_messages(data){
    var messages = data.messages,
        active_user_email = $('#users_container .chat_list.active_chat').attr('data-user-email'),
        users = data.users,
        sorted_messages = [];

    for (var i = 0; i < users.length; i++) {
        var user = users[i];
        if(user.email === active_user_email){
            for(var j = 0; j < messages.length; j++){
                var message = messages[j];
                if((message.reciever_email === user.email || message.sender_email === user.email) && (data.email === message.reciever_email || data.email === message.sender_email )){
                    sorted_messages.push(message);
                }
            }
            sorted_messages = sort_by_date(sorted_messages);
            //////console.log('sorted_messages: '+JSON.stringify(sorted_messages));
            $('#mesgs .msg_history').html('');
            for(var k = 0; k < sorted_messages.length; k++){
                var sender = sorted_messages[k].sender_email,
                    reciever = sorted_messages[k].reciever_email,
                    message = sorted_messages[k].message,
                    formatted_message = '';
                             ////console.log('message: '+(message));
   
                if(active_user_email === sender){
                    formatted_message = format_incoming_message(sorted_messages[k]); 
                    $('#mesgs .msg_history').append(formatted_message);
                    scroll_to_last_msg();
                }else{
                    formatted_message = format_outgoing_message(sorted_messages[k]); 
                    $('#mesgs .msg_history').append(formatted_message);
                    scroll_to_last_msg(); 
                }
            }
        }
    }
    $('#write_msg').focus();
}
function sort_by_date(arr){
    //function to sort json data - ascending
    return arr.sort(function(a, b) {//a = x and b = (x+1) 
            var x = new Date(a.date); //Date() data type
            var y = new Date(b.date);
        return (x < y ? -1 : 1);
    });
}
function sort_work_array(arr){
    //function to sort json data - ascending
    return arr.sort(function(a, b) {//a = x and b = (x+1) 
            var x = parseInt(a.num); 
            var y = parseInt(b.num);
        return (x < y ? -1 : 1);
    });
}
function load_users_section_handlers(data){
    var add_user = data.add_user_url,
        get_user = data.get_user_url,
        remove_user = data.remove_user,
        update_user = data.update_users,
        home= data.home,
        users = data.users;

        ////console.log('loading users section');
        ////console.log('user: '+JSON.stringify(users) );

        /*
        $.post( get_user, {'get_user':'get_user'}, function( response ) {
            ////console.log('response users: '+JSON.stringify(response));
            populate_users_table(response);
        },'JSON');
    */
    //might add this later..
    $('#password_new').on('click',function(){
           $(this).val(''); 
    });
    $('#add_user').on('click',function(){
        var name = $('#user_name').text(),
            email = $('#user_email').text(),
            address = $('#user_address').text(),
            phone = $('#user_phone').text(),
            company = $('#user_company').text(),
            type = $('#user_type').text(),
            password = $('#user_password').val(),
            valid = true,
            output = '<p class="alert alert-danger">';
            
            if(!isEmail(email)){
                output += 'invalid email format. ';
                valid = false;
            }
            if(name.length < 3){
                output += 'Please enter a name greater than 2 characters. ';
                valid = false;
            }
            if(password.length < 5){
                output += 'Please enter a password greater than 4 characters. ';
                valid = false;
            }
            if(type.length < 4){
                output += 'Please enter a type greater than 4 characters. ';
                type = type.toLowerCase();
                valid = false;
            }else{type = type.toLowerCase();}
            if(type !== 'admin' && type !== 'client' && type !== 'vendor'){
                output += 'Available user types are admin, client, or vendor. ';
                type = type.toLowerCase();
                valid = false;
            }
            
            //reset/hide result/error
            $('#users td').on('click',function(){
                $('#add_user_result').slideUp(1000,function(){
                   $(this).hide().html(''); 
                });
            });
        if(valid){
            var new_user_data = {
                'name':name,
                'email':email,
                'address':address,
                'phone':phone,
                'company':company,
                'password':password,
                'type':type
            };          
            ////console.log('add_user_data: '+JSON.stringify(new_user_data));
            ////console.log('add_user_url: '+add_user);
            ////console.log('data: '+JSON.stringify(data));
            //($name, $email, $address, $company, $password, $pic, $phone, $role, $date)
            $.post( add_user, new_user_data, function( response ) {
                
                ////console.log('response: '+JSON.stringify(response));
                ////console.log('response: '+(response));

                output = response.msg;//load json data from server and output message
                if(response.error === 0){
                    var users = response.users;
                    data.users = users;
                    populate_users_table(data);
                }
                $('#add_user_result').hide().html(output).slideDown(1000);
            },'JSON');
        }else{
            output += '</p>';
            $('#add_user_result').hide().html(output).slideDown(1000);
        }
    });
    $('#all_users td').on('click',function(){
        if($(this).text() === '*hidden*'){
            $(this).text('');
        }
    })
    //remove hidden text on field click
    $('.password_new').val('*hidden*');
    $('.password_new').on('click',function(){
        if( $(this).val() === '*hidden*' ){
            $(this).html('');
        }
    });
    //remove btn handler
    $('.remove_user').on('click',function(){
        var id = $(this).attr('id');
        var data = {
            'id':id
        };
        ////console.log('data: '+JSON.stringify(data));
        ////console.log('remove_user: '+remove_user);
        $.post( remove_user, data, function( response ) {
            var output = response.msg;//load json data from server and output message
            ////console.log(output);
            ////console.log('made request');
            if(response.error === 0){
                var users = response.users;
                data.users = users;
                populate_users_table(data);
            }
            $('#user_update_result').hide().html(output).slideDown(1000);
        },'JSON');
    });
    //update btn handler
    $('#update_user').on('click',function(e){
        e.preventDefault();
       var usersItemsArray = getUserTableData();//table array
       var no_error = true;
       for(var i = 0; i < usersItemsArray.length; i++){
           if(!usersItemsArray[i].no_error){no_error = false;}
       }
       if(no_error){
            usersItemsArray = $.toJSON(usersItemsArray);//convert to json - jQuery add-on.
            $.ajax({
                type: "POST",
                url: home+'/workers/update_users.php',
                data: "userTblData=" + usersItemsArray,
                success: function(result){
                    console.log('update success: '+result);
                    $('#user_update_result').hide().html(result).slideDown(1000);        
                },
                error: function (e){
                                        console.log('update error: '+e);

                    $('#user_update_result').hide().html('<p class="alert alert-danger">error..</p>').slideDown(1000);        
                }
            });
        }else{
            var output = '<p class="alert alert-danger">Type must be admin, client, or vendor.</p>';
            $('#user_update_result').hide().html(output).slideDown(1000);        
        }
    });
}

function load_email_section_handlers(data){
    var add_email = data.add_email_url,
        get_email = data.get_email_url,
        remove_email = data.remove_email,
        update_email = data.update_email,
        emails = data.emails;

        ////console.log('loading email section');
        ////console.log('emails: '+JSON.stringify(emails) );

/*
        $.post( get_email, {}, function( response ) {
            ////console.log('response emails: '+JSON.stringify(response));
            populate_emails_table(response.emails);
        },'JSON');
*/
    $('#all_emails tr th').click(function(){
        if($(this).text()==='Password (hidden)' ||$(this).text()==='*hidden*'){$(this).text('');}
    })
    $('#password_new').on('click',function(){
           $(this).val(''); 
    });
    $('#add_email').on('click',function(){
        var email = $('#email_new').val(),
            password = $('#password_new').val(),
            valid = true,
            output = '<p class="alert alert-danger">';
            ////console.log('enmail: '+email);
            ////console.log('pass: '+password);
            if(email.indexOf('@') < 1|| email.indexOf('.') < 1){
                output += 'invalid email format. ';
                valid = false;
            }else if(email.toLowerCase().indexOf('richcopropertysolutions') < 1 || email.indexOf('com') < 1 ){
                output += 'must end in richcopropertysolutions.com ';
                valid = false;
            }
            if(!isEmail(email)){
                output += 'not a valid email address. ';
                valid = false;
            }
            if(password.length < 5){
                output += 'Please enter a password greater than 5 characters. ';
                valid = false;
            }
            //reset/hide result/error
            $('#email_add td').on('click',function(){
                $('#email_add_result').slideUp(1000,function(){
                   $(this).hide().html(''); 
                });
            });
        if(valid){
            var new_email_data = {
                'email':email,
                'password': password
            };          
            ////console.log('add_email_data: '+JSON.stringify(new_email_data));
            ////console.log('add_email_url: '+add_email);

            $.post( add_email, new_email_data, function( response ) {
                            ////console.log('response: '+JSON.stringify(response));
                            ////console.log('response: '+(response));

                output = response.msg;//load json data from server and output message
                if(response.error === 0){
                    var emails = response.emails;
                    data.emails = emails;
                    populate_emails_table(data);
                }
                $('#email_add_result').hide().html(output).slideDown(1000);
            },'JSON');
        }else{
            output += '</p>';
            $('#email_add_result').hide().html(output).slideDown(1000);
        }
    });
    
    //remove hidden text on field click
    $('.password_new').val('*hidden*');
    $('.password_new').on('click',function(){
        if($(this).val() === '*hidden*'){
            $(this).html('');
        }
    });
    //remove btn handler
    $('.remove_email').on('click',function(){
        var id = $(this).attr('id');
        var data = {
            'id':id
        };
        ////console.log('data: '+JSON.stringify(data));
        ////console.log('remove_email: '+remove_email);
        $.post( remove_email, data, function( response ) {
            var output = response.msg;//load json data from server and output message
            ////console.log(output);
            ////console.log('made request');
            if(response.error === 0){
                var emails = response.emails;
                data.emails = emails;
                populate_emails_table(data);
            }
            $('#email_update_result').hide().html(output).slideDown(1000);
        },'JSON');
    });
    //update btn handler
    $('#update_email').on('click',function(){
       var emailItemsArray = getEmailTableData();//table array
        emailItemsArray = $.toJSON(emailItemsArray);//convert to json - jQuery add-on.
        /*
        $.post( update_email, emailItemsArray, function( response ) {
            var output = response.msg;//load json data from server and output message
            $('#email_update_result').hide().html(output).slideDown(1000);        
        },'JSON');
        */
        
        $.ajax({
            type: "POST",
            url: update_email,
            data: "emailTblData=" + emailItemsArray,
            success: function(result){
            $('#email_update_result').hide().html(result).slideDown(1000);        
            },
            error: function (e){
            $('#email_update_result').hide().html(e).slideDown(1000);        
            }
        });
    });
}

//@param data json array - email addresses etc..
function populate_users_table(data){
    var users = data.users;
    if(users.length > 0){
        var data_rows = '';
        $('#all_users').html('');//start w clean <tbody>
        for (i = 0; i < users.length; i++) {
            data_rows = '';//reset variable for iteration
            data_rows += '<tr class="email_row">';
            data_rows += '<td class="user_name">'+users[i].name+'</td>';
            data_rows += '<td class="user_email" contenteditable="false">'+users[i].email+'</td>';
            data_rows += '<td class="user_address">'+users[i].address+'</td>';
            data_rows += '<td class="user_phone">'+users[i].phone+'</td>';
            data_rows += '<td class="user_company">'+users[i].company+'</td>';
            data_rows += '<td class="user_role">'+users[i].type+'</td>';
            data_rows += '<td class="user_password">'+users[i].password+'</td>';
            data_rows += '<td class="remove_user"><button class="btn btn-outline-green btn-sm remove_user" id="'+users[i].id+'">Remove</button></td>';
            data_rows += '</tr>';
            $('#all_users').append(data_rows);
        }
    }
    setTimeout(function(){
        load_users_section_handlers(data);//reset handlers
    },100);//wait for loop
}
//@param data json array - email addresses etc..
function populate_emails_table(data){
    var emails = data.emails;
    if(emails.length > 0){
        var data_rows = '';
        $('#all_emails').html('');
        for (i = 0; i < emails.length; i++) {
            data_rows = '';
            data_rows += '<tr class="email_row">';
            data_rows += '<td class="email_name" contenteditable="false">'+emails[i].email+'</td>';
            data_rows += '<td class="email_password"><input  class="password_new" type="password" data-id="password_'+emails[i].id+'" value="'+emails[i].password+'"/>'+'</td>';
            data_rows += '<td class="email_remove"><button class="btn btn-outline-green btn-sm remove_email" id="'+emails[i].id+'">Remove</button></td>';
            data_rows += '</tr>';
            $('#all_emails').append(data_rows);
        }
        for (i = 0; i < emails.length; i++) {
            var id = emails[i].id,
                pass = emails[i].password,
                code = "password_"+id;
            $('.password_new').each(function(){
                if($(this).attr('data-id') === code){
                    $(this).val(pass);
                    ////console.log('new: ');
                    ////console.log($(this).attr('id'));
                    ////console.log($(this).val());
                }else{
                                    ////console.log('nope ');
                }
            });
        }//end for loop
    }
    setTimeout(function(){
        load_email_section_handlers(data);        
    },100);
}

//@return array - inv table data
function getUserTableData(){
    var itemsArray = new Array();//initialize
    //iterate rows in all tables!
    $('#all_users tr').each(function(row, tr){
            //make a giant array
            itemsArray[row]={
                    "name" : $(tr).find('.user_name').text(),
                    "email" : $(tr).find('.user_email').text(),
                    "address" : $(tr).find('.user_address').text(),
                    "phone" : $(tr).find('.user_phone').text(),
                    "company" : $(tr).find('.user_company').text(),
                    "role" : $(tr).find('.user_role').text(),
                     "id" : $(tr).find('.remove_user').attr('id'),
                     "no_error": ($(tr).find('.user_role').text() === 'admin' || $(tr).find('.user_role').text() === 'client' || $(tr).find('.user_role').text() === 'vendor')
            };
    }); 
    return itemsArray;//final array
}
//@return array - inv table data
function getEmailTableData(){
    var itemsArray = new Array();//initialize
    //iterate rows in all tables!
    $('#all_emails tr').each(function(row, tr){
            //make a giant array
            itemsArray[row]={
                    "email" : $(tr).find('.email_name').text(),
                     "password" :$(tr).find('.password_new').val(),
                     "id" : $(tr).find('.remove_email').attr('id')
                    /*
                    db attributes are:
                    id, name, price, description, type, quantity, par, salvage_cost, salvage_date, views, pic
                    */
            };
    }); 
    return itemsArray;//final array
}
function enable_signup(signup_url){
    $('#signup').on('click',function(e){
        e.preventDefault();
        var name = $('#name').val(),
            phone = $('#phone').val(),
            email = $('#email').val(),
            company = $('#company').val(),
            comments = $('#comments').val(),
            address = $('#address').val(),
            valid = true, error = '';
            
            if(!isEmail(email)){
                $('#email').css('border-color','red');
                error = error + "Invalid Email! ";
                valid = false;
            }
            if(valid){
                //////console.log('email: '+email+' password: '+password);
                var data = {
                    'email':email,
                    'phone':phone,
                    'name':name,
                    'address':address,
                    'company':company,
                    'comments':comments
                };
                var output = "";//for final message
                $.post( signup_url, data, function( response ) {
                                    ////console.log('response: '+response);

                    ////console.log(JSON.stringify(response));
                    output = response.msg;//load json data from server and output message
                    if(response.error === 1){ //error?
                        $( "#signup_result" ).hide().html( output ).slideDown(1000);//show error message
                    }else{//success
                        $( "#signup_result" ).hide().html( output ).slideDown(1000);//show error message
                    }
                },'JSON');
            }else{
                ////console.log('invalid');
                $('#signup_result').hide().html('<p class="alert alert-danger">'+error+'</p>').slideDown(1000);
            }
    });
}
function add_active(elem){
    $('.sidebar-menu li a').each(function(){
       if($(this).hasClass('active')){
           $(this).removeClass('active');
       }
    });
    elem.addClass('active');
}
function enable_login(login_url, home){
    $('#toggle_login').on('click', function() {
        var container = jQuery('.cont');
        if(jQuery(container).hasClass('s--signup')){
            jQuery(container).removeClass('s--signup');
            $('#work').removeClass('show_work');
            $('#home').addClass('show_home');
        }else{
            jQuery(container).addClass('s--signup');
            $('#work').addClass('show_work');
            $('#home').removeClass('show_home');
        }
    });
    
    $('#signin').on('click',function(e){
        e.preventDefault();
        var password = $('#password_signin').val(),
            email = $('#email_signin').val(),
            valid = true, error = '';
            if(password.length < 4){
                error = error + "Password must be greater than 4 characters! ";
                valid = false;
                $('#password_signin').css('border-color','red');
            }
            if(!isEmail(email)){
                $('#email_signin').css('border-color','red');
                error = error + "Invalid Email! ";
                valid = false;
            }
            if(valid){
                //////console.log('email: '+email+' password: '+password);
                var data = {
                    'email':email,
                    'password':password
                };
                var output = "";//for final message
                $.post( login_url, data, function( response ) {
                    //////console.log(JSON.stringify(response));
                    output = response.msg;//load json data from server and output message
                    if(response.error === 1){ //error?
                        $( "#signin_result" ).hide().html( output ).slideDown(1000);//show error message
                    }else{//success
                        $( "#signin_result" ).hide().html( output ).slideDown(1000);//show error message
                        var user_data = {
                                'name':response.name,
                                'phone':response.phone,
                                'email':response.email,
                                'address':response.address,
                                'background':response.background,
                                'years':response.years,
                                'pic':response.pic,
                                'coverage':response.coverage,
                                'subcontractors':response.subcontractors,
                                'company':response.company,
                                'message':response.comments,
                                'id':response.id,
                                'type':response.type,
                                'emails':response.emails,
                                'users':response.users,
                                'home':home,
                                'messages':response.messages,
                                'add_email_url':response.add_email_url,
                                'add_user_url':response.add_user_url,
                                'get_email_url':response.get_email_url,
                                'get_user_url':response.get_user_url,
                                'get_messges_url':response.get_messges_url,
                                'remove_email':response.remove_email,
                                'remove_user':response.remove_user,
                                'update_email':response.update_email,
                                'update_user':response.update_user,
                                'send_message':response.send_message,
                                'signout_url':response.signout_url,
                                'upload_file_url':response.upload_file_url,
                                'get_work':response.get_work,
                                'add_work_url':response.add_work_url,
                                'all_work_orders':response.all_work_orders
                            };
                        setTimeout(function(){
                            var page = home+'/pages/control_panel.php';
                            $('#admin_content').html('');
                            $('#admin_content').load(page,function(){
                                    setTimeout(function(){
                                        jQuery('#ftco-loader').removeClass('show');
                                        enable_dashboard(user_data);
                                    },1000);
                            });
                        },2000);
                    }
                },'JSON');
            }else{
                //console.log('invalid');
                $('#signin_result').hide().html('<p class="alert alert-danger">'+error+'</p>').slideDown(1000);
            }
    });
}
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function load_profile_section_handlers(data){
    if( data.type !== null ){
        var type    = data.type,
            name    = data.name,
            phone   = data.phone,
            pic     = data.pic,
            address = data.address,
            id      = data.id,
            email   = data.email,
            company = data.company,
            date= data.date;
            if(pic !== null && pic !== '' && pic !== ' ' && pic !== undefined){
                var fileName = '../wp-content/themes/richco/images/'+pic;
                $('#avatar-preview').html("<img src='"+fileName+"'>");//set img
                $('#userInfo').html("<img  class='img-fluid rounded-circle shadow' src='"+fileName+"'>");//set 2nd img
            }
            $('.name').html(name);
            $('.type_name').html(type.replace('s',''));
            
            //getElementByID()
            $('#name').find('input.profile-field').attr('placeholder',name);
            $('#phone').find('input.profile-field').attr('placeholder',phone);
            $('#address').find('input.profile-field').attr('placeholder',address);
            $('#email').find('input.profile-field').attr('placeholder',email);
            $('#company').find('input.profile-field').attr('placeholder',company);
    }
    
    //reset errors on key up
    $('.profile-field').on('click keyup',function(){
        if($('#photo_result').find('p').hasClass('alert')){//if theres alerts
            $('#photo_result').slideUp(1000,function(){$(this).html('')});//slide up
        }
        if($('#result').find('p').hasClass('alert')){//if theres alerts
            $('#result').slideUp(1000,function(){$(this).html('')});//slide up
        }
    });
    
    //handle save button
    $('#profile-save').on("click",function(){
        //initialize variables
        var email   = $("#email").find('input.profile-field').val(),
            name    = $("#name").find('input.profile-field').val(),
            address = $("#address").find('input.profile-field').val(),
            phone   = $("#phone").find('input.profile-field').val(),
            company = $("#company").find('input.profile-field').val(),
            valid   = true, error = '';
        //check email - quick validation 
        if(email.length > 0){
            valid = isEmail(email);
            if(!valid){error += 'Incorrect Email format. ';}
        }
        //additional validation - check for empty fields
        if(email.length < 1 && name.length < 1 && address.length < 1 && phone.length < 1 && company.length < 1){
            error += "You must enter at least one field to update. Nothing to update! ";
            valid = false;
        }
        //console.log('length: '+email.length);
        if(valid){
            //get data from form
            var data ={
                'email':email,
                'name':name,
                'address':address,
                'phone':phone,
                'company':company
            };
            
            $.post( "../wp-content/themes/richco/workers/save_profile.php",data, function( response ) {
                //console.log(JSON.stringify(response));
                    var output = "";//for final message
                    if(response.error === 1){ //error
                       var output = '<p class="alert alert-danger">'+response.msg+'</p>'; 
                       $('#result').hide().html(output).slideDown(1000);//expand error
                    }else{//success
                       var output = '<p class="alert alert-info"'+response.msg+'</p>'; 
                       $('#result').hide().html(output).slideDown(1000);//expand success
                       $('.profile-field').each(function(){$(this).val('');});
                       //console.log('pic: '+response.pic);
                       load_profile_section_handlers(response);
                    }
            },'JSON');
            
        }else{//bad email
            var output = '<p class="alert alert-danger">'+error+'</p>';
            $('#result').hide().html(output).slideDown(1000);//expand success        
        }
    });
    
    var frm = $('#image_upload_form');//get hidden form reference

    //clicking anywhere on the avatar open the file dialog
    $('#avatar-upload').on("click",function(){
        $('#photoimg').click();
    });
    
    //start file dialog
    $('#photoimg').on('change', function(event) {
        //get file location
        var fileName = URL.createObjectURL(event.target.files[0]);
        $('#avatar-preview').html("<img src='"+fileName+"'>");//set img
        $('#userInfo').html("<img  class='img-fluid rounded-circle shadow' src='"+fileName+"'>");//set 2nd img
    
        //finally, submit upload
        frm.submit();
	});
 
    //hidden form upload
    frm.submit(function (e) {
    	e.preventDefault();//prevent reload
        //hide errors
        $('.alert-danger').hide();
        $('.alert-success').hide();
    	var formData = new FormData();//create form data
        formData.append('photoimg', $('#photoimg')[0].files[0]);//add image to form data
        var output;//hold result
        //finally, send to php form
        $.ajax({
            type: frm.attr('method'),//post
            url: "../wp-content/themes/richco/workers/uploadphoto.php",
            data: formData,//data above - this is the actual photo
            dataType: "json",
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            success: function (data) {//show success msg
                ////console.log(data);
                ////console.log("success");
                if(data.error === 1) {
                    output = '<p class="alert alert-danger">'+data.msg+'</p>';
                } else {
                    output = '<p class="alert alert-info">'+data.msg+'</p>';
                }
                $('#photo_result').hide().html(output).slideDown(1000);//expand result of upload
            },
            error: function (data) {//show error msg
                ////console.log("error: "+data);
                var error;
                if(data.statusText !== null)error = data.statusText;
                else if(data.msg !== null)error = data.msg;
                else error = 'unknown error!';
                output = '<p class="alert alert-danger">'+error+'</p>';
                $('#photo_result').hide().html(output).slideDown(1000);//expand error
            }
        });//end ajax
    }); //end form submit 
}
function convert_date(t){
    // Split timestamp into [ Y, M, D, h, m, s ]
    t = t.split(/[- :]/);
    // Apply each element to the Date function
    var d = new Date(Date.UTC(t[0], t[1]-1, t[2], t[3], t[4], t[5]));
    return d;
}
function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
function getTimeFromDate(date) {
  var hours = date.getHours() - 5;
  if(hours < 1){
      hours = 12 + hours;
  }
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'PM' : 'AM';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + ampm;
  return strTime;
}
function format_normal_date(dateIn) {
  var yyyy = dateIn.getFullYear();
  var mm = dateIn.getMonth() + 1; // getMonth() is zero-based
  var dd = dateIn.getDate();
  return String(mm +'/'+dd+'/' + yyyy ); // Leading zeros for mm and dd
}
})(jQuery);