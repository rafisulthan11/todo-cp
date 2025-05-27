<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<title>{{ config('app.name') }}</title>

	<!-- Roboto font embed -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet" />

	<!-- Font awesome -->
	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css" />

	<style>
		* {
			box-sizing: border-box;
		}

		body {
			font-family: 'Roboto', sans-serif;
			background: linear-gradient(145deg, #e0eafc, #cfdef3);
			margin: 0;
			padding: 20px;
			display: flex;
			flex-direction: column;
			align-items: center;
		}

		header {
			background: #fff;
			padding: 20px;
			width: 100%;
			max-width: 600px;
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
			border-radius: 12px;
			margin-bottom: 30px;
			transition: box-shadow 0.3s ease;
		}

		header:hover {
			box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
		}

		header form {
			display: flex;
			align-items: center;
			gap: 10px;
		}

		header input[type='text'] {
			flex: 1;
			padding: 12px 16px;
			border: 1px solid #ccc;
			border-radius: 8px;
			font-size: 16px;
			transition: border 0.3s;
		}

		header input[type='text']:focus {
			border-color: #007bff;
			outline: none;
		}

		button#add {
			background: #28a745;
			border: none;
			padding: 12px;
			border-radius: 50%;
			cursor: pointer;
			display: flex;
			align-items: center;
			justify-content: center;
			transition: background 0.3s ease, transform 0.2s ease;
		}

		button#add:hover {
			background: #218838;
			transform: scale(1.05);
		}

		header svg {
			fill: #ffffff;
			width: 20px;
			height: 20px;
		}

		.container {
			width: 100%;
			max-width: 600px;
		}

		ul.todo {
			list-style: none;
			padding: 0;
			margin: 0;
		}

		ul.todo li {
			background: #fff;
			margin-bottom: 15px;
			padding: 15px 20px;
			border-radius: 10px;
			display: flex;
			flex-direction: column;
			justify-content: space-between;
			box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
			transition: transform 0.2s ease;
		}

		ul.todo li:hover {
			transform: translateY(-3px);
		}

		ul.todo li strong {
			font-weight: 500;
		}

		ul.todo li span {
			font-size: 13px;
			color: #777;
			margin-top: 5px;
		}

		ul.todo li form {
			display: flex;
			align-items: center;
			justify-content: space-between;
			margin-top: 10px;
		}

		button.delete {
			background: none;
			border: none;
			cursor: pointer;
			color: #dc3545;
			font-size: 18px;
			transition: transform 0.2s, color 0.3s;
		}

		button.delete:hover {
			color: #b71c1c;
			transform: scale(1.2);
		}

		@media (max-width: 500px) {
			header form {
				flex-direction: column;
				align-items: stretch;
			}

			button#add {
				border-radius: 8px;
				width: 100%;
			}

			ul.todo li {
				padding: 12px 15px;
			}
		}
	</style>
</head>
<body>
	<header>
		<form action="{{ url('/item') }}" method="POST">
			@csrf
			<input type="text" placeholder="Enter an activity.." name="item" required />
			<button id="add">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
					viewBox="0 0 16 16" xml:space="preserve">
					<g>
						<path class="fill"
							d="M16,8c0,0.5-0.5,1-1,1H9v6c0,0.5-0.5,1-1,1s-1-0.5-1-1V9H1C0.5,9,0,8.5,0,8s0.5-1,1-1h6V1
							c0-0.5,0.5-1,1-1s1,0.5,1,1v6h6C15.5,7,16,7.5,16,8z" />
					</g>
				</svg>
			</button>
		</form>
	</header>

	<div class="container">
		<ul class="todo" id="todo">
			@foreach ($tasks as $task)
			<li>
				<strong>{{ $task->name }}</strong>
				<form action="{{ route('item.destroy', $task->id) }}" method="post">
					@csrf
					@method('DELETE')
					<span>Created at: {{ $task->created_at }}</span>
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
