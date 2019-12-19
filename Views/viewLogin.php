
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8"/>
	<meta http-equiv="Content-Type"
	content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Controle de Acesso</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="card" style="margin:10px">
		<div class="card-header">
			<h5 class="card-title">CONTROLE DE ACESSO</h5>
		</div>
		<div class="card-body">	
    <form method="POST" action="../Login/checkLogin.php">
        <div class="form-group">
          <label>Login</label>
          <input type="text" name= "login" class="form-control" 
          id="exampleDropdownFormEmail2" placeholder="Digite seu Login">
        </div>

        <div class="form-group">
          <label>Senha</label>
          <input type="password" name = "senha" class="form-control" 
          id="exampleDropdownFormPassword2" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary">Acessar</button>
    </form>
		</div>
	</div>		
</body>
</html>


