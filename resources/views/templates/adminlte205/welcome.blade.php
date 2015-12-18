{{--Copyright (c) 2015 "Werner Maisl"--}}

{{--This file is part of the Store Webpanel V2.--}}

{{--The Store Webpanel V2 is free software: you can redistribute it and/or modify--}}
{{--it under the terms of the GNU Affero General Public License as--}}
{{--published by the Free Software Foundation, either version 3 of the--}}
{{--License, or (at your option) any later version.--}}

{{--This program is distributed in the hope that it will be useful,--}}
{{--but WITHOUT ANY WARRANTY; without even the implied warranty of--}}
{{--MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the--}}
{{--GNU Affero General Public License for more details.--}}

{{--You should have received a copy of the GNU Affero General Public License--}}
{{--along with this program. If not, see <http://www.gnu.org/licenses/>.--}}

<html>
<head>
    <title>StoreWebPanel</title>

    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
            margin-bottom: 40px;
        }

        .subtitle {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .link {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .footer-first {
            font-size: 12px;
            margin-bottom: 10px;
            margin-top: 30px;
        }

        .footer {
            font-size: 12px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Store WebPanel 2</div>
        <div class="subtitle">A glimpse to the future of the Store Plugin</div>
        <div class="link"><a href="{{URL::route("webpanel.dashboard")}}">Proceed to the Admin Interface</a></div>
        <div class="link"><a href="{{URL::route("userpanel.dashboard")}}">Proceed to the User Interface</a></div>
        <div class="footer-first">Store Webpanel 2 - &copy; 2015 by Werner Maisl</div>
        <div class="footer">Store Plugin - &copy; 2013-2015 Alon Gubkin, Keith Warren (Drixevel)</div>
    </div>
</div>
</body>
</html>
