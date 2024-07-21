@extends('layout')
@section('title', 'Home')
@section('content')
    @auth
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header text-white bg-primary">AI Chat Bot</div>
                        <div class="card-body p-4">
                            <div id="chat-window" class="chat-window mb-3">
                                <div id="messages" class="messages"></div>
                            </div>
                            <div class="input-group">
                                <input id="user-input" type="text" class="form-control" placeholder="Type your message here...">
                                <div class="input-group-append">
                                    <button id="send-btn" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .chat-window {
                height: 70vh;
                border: 1px solid #ccc;
                border-radius: .5rem;
                padding: 10px;
                overflow-y: auto;
                background-color: #f8f9fa;
            }
            .messages {
                height: 100%;
                overflow-y: auto;
            }
            .message {
                display: flex;
                align-items: flex-start;
                margin-bottom: 10px;
            }
            .message.user {
                flex-direction: row;
                justify-content: flex-end;
            }
            .message.user .bubble {
                background-color: #007bff;
                color: white;
                border-bottom-right-radius: 0;
                align-self: flex-start;
                margin-left: 10px;
                order: 2;
                float:right;
            }
            .message.bot {
                flex-direction: row-reverse;
                justify-content: flex-end;
            }
            .message.bot .bubble {
                background-color: #e9ecef;
                color: black;
                border-bottom-left-radius: 0;
                align-self: flex-start;
                margin-right: 10px;
                /* order: 2; */
            }
            .avatar {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background-color: #6c757d;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 1rem;
            }
            .bubble {
                max-width: 70%;
                padding: 10px;
                border-radius: 20px;
                display: inline-block;
                word-wrap: break-word;
            }
        </style>
        <div style="display: none">{{auth()->user()->name}}</div>
    @endauth
@endsection

