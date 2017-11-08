@extends('layouts.BaseLayout')

@section('customStyles')
    <style>
        
        
        #custom-search-input {
            background: #e8e6e7 none repeat scroll 0 0;
            margin: 0;
            padding: 10px;
        }
        #custom-search-input .search-query {
            background: #fff none repeat scroll 0 0 !important;
            border-radius: 4px;
            height: 33px;
            margin-bottom: 0;
            padding-left: 7px;
            padding-right: 7px;
        }
        #custom-search-input button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: 0 none;
            border-radius: 3px;
            color: #666666;
            left: auto;
            margin-bottom: 0;
            margin-top: 7px;
            padding: 2px 5px;
            position: absolute;
            right: 0;
            z-index: 9999;
        }
        .search-query:focus + button {
            z-index: 3;
        }
        .all_conversation button {
            background: #f5f3f3 none repeat scroll 0 0;
            border: 1px solid #dddddd;
            height: 38px;
            text-align: left;
            width: 100%;
        }
        .all_conversation i {
            background: #e9e7e8 none repeat scroll 0 0;
            border-radius: 100px;
            color: #636363;
            font-size: 17px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            width: 30px;
        }
        .all_conversation .caret {
            bottom: 0;
            margin: auto;
            position: absolute;
            right: 15px;
            top: 0;
        }
        .all_conversation .dropdown-menu {
            background: #f5f3f3 none repeat scroll 0 0;
            border-radius: 0;
            margin-top: 0;
            padding: 0;
            width: 100%;
        }
        .all_conversation ul li {
            border-bottom: 1px solid #dddddd;
            line-height: normal;
            width: 100%;
        }
        .all_conversation ul li a:hover {
            background: #dddddd none repeat scroll 0 0;
            color:#333;
        }
        .all_conversation ul li a {
            color: #333;
            line-height: 30px;
            padding: 3px 20px;
        }
        .member_list .chat-body {
            margin-left: 47px;
            margin-top: 0;
        }
        .top_nav {
            overflow: visible;
        }
        .member_list .contact_sec {
            margin-top: 3px;
        }
        .member_list li {
            padding: 6px;
        }
        .member_list ul {
            border: 1px solid #dddddd;
        }
        .chat-img img {
            height: 34px;
            width: 34px;
        }
        .member_list li {
            border-bottom: 1px solid #dddddd;
            padding: 6px;
        }
        .member_list li:last-child {
            border-bottom:none;
        }
        .member_list {
            height: 380px;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .sub_menu_ {
            background: #e8e6e7 none repeat scroll 0 0;
            left: 100%;
            max-width: 233px;
            position: absolute;
            width: 100%;
        }
        .sub_menu_ {
            background: #f5f3f3 none repeat scroll 0 0;
            border: 1px solid rgba(0, 0, 0, 0.15);
            display: none;
            left: 100%;
            margin-left: 0;
            max-width: 233px;
            position: absolute;
            top: 0;
            width: 100%;
        }
        .all_conversation ul li:hover .sub_menu_ {
            display: block;
        }
        .new_message_head button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
        }
        .new_message_head {
            background: #f5f3f3 none repeat scroll 0 0;
            float: left;
            font-size: 13px;
            font-weight: 600;
            padding: 18px 10px;
            width: 100%;
        }
        .message_section {
            border: 1px solid #dddddd;
        }
        .chat_area {
            float: left;
            height: 300px;
            overflow-x: hidden;
            overflow-y: auto;
            width: 100%;
        }
        .chat_area li {
            padding: 14px 14px 0;
        }
        .chat_area li .chat-img1 img {
            height: 40px;
            width: 40px;
        }
        .chat_area .chat-body1 {
            margin-left: 50px;
        }
        .chat-body1 p {
            background: #fbf9fa none repeat scroll 0 0;
            padding: 10px;
        }
        .chat_area .admin_chat .chat-body1 {
            margin-left: 0;
            margin-right: 50px;
        }
        .chat_area li:last-child {
            padding-bottom: 10px;
        }
        .message_write {
            background: #f5f3f3 none repeat scroll 0 0;
            float: left;
            padding: 15px;
            width: 100%;
        }
        
        .message_write textarea.form-control {
            height: 70px;
            padding: 10px;
        }
        .chat_bottom {
            float: left;
            margin-top: 13px;
            width: 100%;
        }
        .upload_btn {
            color: #777777;
        }
        .sub_menu_ > li a, .sub_menu_ > li {
            float: left;
            width:100%;
        }
        .member_list li:hover {
            background: #428bca none repeat scroll 0 0;
            color: #fff;
            cursor:pointer;
        }
    
    </style>
    @stop

@section('body')
    <div class="main_section">
        <div class="">
            <div class="chat_container">
                <div class="col-sm-3 chat_sidebar" style="padding: 0">
                    <div class="">
                        <div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="  search-query form-control" placeholder="Conversation" />
                                <button class="btn btn-danger" type="button">
                                    <span class=" glyphicon glyphicon-search"></span>
                                </button>
                            </div>
                        </div>
                        <div class="dropdown all_conversation">
                            <button class="dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-weixin" aria-hidden="true"></i>
                                Conversations
                                <span class="caret pull-right"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <li><a href="#"> All Conversation </a>  <ul class="sub_menu_ list-unstyled">
                                        <li><a href="#"> All Conversation </a> </li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <div class="member_list tabs-left">
                            <ul class="list-unstyled nav nav-tabs">
                                <li class="left clearfix active">
                                    <a href="#12" data-toggle="tab">
                                         <span class="chat-img pull-left">
                                     <img src="/img/user_uploads/1504271228.jpeg" alt="User Avatar" class="img-circle">
                                     </span>
                                        <div class="chat-body clearfix">
                                            <div class="header_sec">
                                                <strong class="primary-font">Jean Louis</strong>
                                            
                                            </div>
                                            <div class="contact_sec">
                                                <strong class="primary-font">09:45AM</strong> <span class="badge pull-right">3</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="left clearfix">
                                    <a href="#13" data-toggle="tab">
                                         <span class="chat-img pull-left">
                                     <img src="/img/user_uploads/1504271228.jpeg" alt="User Avatar" class="img-circle">
                                     </span>
                                        <div class="chat-body clearfix">
                                            <div class="header_sec">
                                                <strong class="primary-font">Minka Junior</strong>
                                            </div>
                                            <div class="contact_sec">
                                                <strong class="primary-font">09:45AM</strong> <span class="badge pull-right">3</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="left clearfix">
                                    <a href="#14" data-toggle="tab">
                                         <span class="chat-img pull-left">
                                     <img src="/img/user_uploads/1504271228.jpeg" alt="User Avatar" class="img-circle">
                                     </span>
                                        <div class="chat-body clearfix">
                                            <div class="header_sec">
                                                <strong class="primary-font">Jack Sparrow</strong> <strong class="pull-right">
                                                    09:45AM</strong>
                                            </div>
                                            <div class="contact_sec">
                                                <strong class="primary-font">(123) 123-456</strong> <span class="badge pull-right">3</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="left clearfix">
                                    <a href="#15" data-toggle="tab">
                                         <span class="chat-img pull-left">
                                     <img src="/img/user_uploads/1504271228.jpeg" alt="User Avatar" class="img-circle">
                                     </span>
                                        <div class="chat-body clearfix">
                                            <div class="header_sec">
                                                <strong class="primary-font">Jack Sparrow</strong> <strong class="pull-right">
                                                    09:45AM</strong>
                                            </div>
                                            <div class="contact_sec">
                                                <strong class="primary-font">(123) 123-456</strong> <span class="badge pull-right">3</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div></div>
                </div>
                <!--chat_sidebar-->
                
                
                <div class="col-sm-9 message_section" style="padding:0;">
                    <div class="">
                        <div class="new_message_head">
                            <div class="pull-left"><button><i class="fa fa-plus-square-o" aria-hidden="true"></i> New Message</button></div><div class="pull-right"><div class="dropdown">
                                    <button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-cogs" aria-hidden="true"></i>  Setting
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Profile</a></li>
                                        <li><a href="#">Logout</a></li>
                                    </ul>
                                </div></div>
                        </div><!--new_message_head-->
                        
                        
                        <div class="chat_area tab-content">
                            <div class="tab-pane active" id="12">
                                <ul class="list-unstyled">
                                    <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="/img/user_uploads/1504271228.jpeg" alt="User Avatar" class="img-circle">
                     </span>
                                        <div class="chat-body1 clearfix">
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                                            <div class="chat_time pull-right">09:40PM</div>
                                        </div>
                                    </li>
                                    <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="/img/user_uploads/1504271228.jpeg" alt="User Avatar" class="img-circle">
                     </span>
                                        <div class="chat-body1 clearfix">
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                                            <div class="chat_time pull-right">09:40PM</div>
                                        </div>
                                    </li>
                                    <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="/img/user_uploads/1504271228.jpeg" alt="User Avatar" class="img-circle">
                     </span>
                                        <div class="chat-body1 clearfix">
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                                            <div class="chat_time pull-right">09:40PM</div>
                                        </div>
                                    </li>
                                    <li class="left clearfix admin_chat">
                     <span class="chat-img1 pull-right">
                     <img src="/img/user_uploads/1504271228.jpeg" alt="User Avatar" class="img-circle">
                     </span>
                                        <div class="chat-body1 clearfix">
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                                            <div class="chat_time pull-left">09:40PM</div>
                                        </div>
                                    </li>
                                    <li class="left clearfix admin_chat">
                     <span class="chat-img1 pull-right">
                     <img src="/img/user_uploads/1504271228.jpeg" alt="User Avatar" class="img-circle">
                     </span>
                                        <div class="chat-body1 clearfix">
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                                            <div class="chat_time pull-left">09:40PM</div>
                                        </div>
                                    </li
                                </ul>
                            </div>
                            <div class="tab-pane" id="13">
                                <ul class="list-unstyled">
                                    <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="/img/user_uploads/1504271228.jpeg" alt="User Avatar" class="img-circle">
                     </span>
                                        <div class="chat-body1 clearfix">
                                            <p>vhjhbchbdjb 13 o popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                                            <div class="chat_time pull-right">09:40PM</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane" id="14">
                                <ul class="list-unstyled">
                                    <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="/img/user_uploads/1504271228.jpeg" alt="User Avatar" class="img-circle">
                     </span>
                                        <div class="chat-body1 clearfix">
                                            <p>vhjhbchbdjb 14 o popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                                            <div class="chat_time pull-right">09:40PM</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane" id="15">
                                <ul class="list-unstyled">
                                    <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="/img/user_uploads/1504271228.jpeg" alt="User Avatar" class="img-circle">
                     </span>
                                        <div class="chat-body1 clearfix">
                                            <p>vhjhbchbdjb 15 o popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
                                            <div class="chat_time pull-right">09:40PM</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!--chat_area-->
                        
                        
                        
                        
                        <div class="message_write">
                            <textarea class="form-control" placeholder="type a message"></textarea>
                            <div class="clearfix"></div>
                            <div class="chat_bottom"><a href="#" class="pull-left upload_btn"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                    Add Files</a>
                                <a href="#" class="pull-right btn btn-success">
                                    Send</a></div>
                        </div>
                    </div>
                </div> <!--message_section-->
            </div>
        </div>
    </div>
    
@stop

@section('customScripts')
    <script type="text/javascript" src="/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>


    <script>

        var tabsFn = (function() {

            function init() {
                setHeight();
            }

            function setHeight() {
                var $tabPane = $('.tab-pane'),
                    tabsHeight = $('.nav-tabs').height();

                $tabPane.css({
                    height: tabsHeight
                });
            }

            $(init);
        })();

    </script>
    @stop
