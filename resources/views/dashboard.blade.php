<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<title>{{ config('app.name') }}</title>
        
		<!-- Roboto font embed -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">

        <!-- Font awesome -->
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">

        <style>
            body {
                font-family: 'Roboto', sans-serif;
                background: #f4f6f8;
                margin: 0;
                padding: 0;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            header {
                background: #ffffff;
                padding: 20px;
                width: 100%;
                max-width: 600px;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
                margin-top: 30px;
                border-radius: 12px;
            }

            header form {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            header input[type="text"] {
                flex: 1;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 8px;
                font-size: 16px;
            }

            header button#add {
                background: #4CAF50;
                border: none;
                padding: 10px 12px;
                border-radius: 50%;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: background 0.3s ease;
            }

            header button#add:hover {
                background: #43a047;
            }

            header svg {
                fill: #ffffff;
                width: 20px;
                height: 20px;
            }

            .container {
                margin-top: 30px;
                width: 100%;
                max-width: 600px;
            }

            ul.todo {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            ul.todo li {
                background: #ffffff;
                margin-bottom: 15px;
                padding: 15px 20px;
                border-radius: 10px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
                font-size: 16px;
                flex-wrap: wrap;
            }

            ul.todo li span {
                font-size: 12px;
                color: #777;
            }

            ul.todo li form {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-top: 8px;
            }

            ul.todo li button.delete {
                background: transparent;
                border: none;
                cursor: pointer;
                color: #f44336;
                font-size: 18px;
                transition: color 0.3s ease;
            }

            ul.todo li button.delete:hover {
                color: #c62828;
            }
        </style>
	</head>
	<body>

		<header>
			<form action="{{ url('/item') }}" method="POST">
                @csrf
                <input type="text" placeholder="Enter an activity.." name="item" required>
			    <button id="add">
				    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve">
                        <g>
                            <path class="fill" d="M16,8c0,0.5-0.5,1-1,1H9v6c0,0.5-0.5,1-1,1s-1-0.5-1-1V9H1C0.5,9,0,8.5,0,8s0.5-1,1-1h6V1
                            c0-0.5,0.5-1,1-1s1,0.5,1,1v6h6C15.5,7,16,7.5,16,8z"/>
                        </g>
                    </svg>
			    </button>
            </form>
		</header>

		<div class="container">
			<!-- Tasks to-do -->
			<ul class="todo" id="todo">
                @foreach ($tasks as $task)
                    <li>
                        {{ $task->name }}
                        <form action="{{ route('item.destroy', $task->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <span style="color: gray; margin-right: 15px;">Created at: {{ $task->created_at }}</span>
                            <button class="delete">
                                <i class="fa-light fa-trash-can"></i>
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
		</div>
	</body>
</html>
