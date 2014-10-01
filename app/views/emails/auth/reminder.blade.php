<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Restablecer contraseña</h2>

		<div>
			Para restablecer su contraseña, complete este formulario: {{ URL::to('password/reset', array($token)) }}.<br/>
			Este link expira en  {{ Config::get('auth.reminder.expire', 60) }} minutes.
		</div>
	</body>
</html>
