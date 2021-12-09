 <?php
 // session_start inicia a sessão
session_start();
 // as variáveis login e senha recebem os dados da

 $email_usu = $_POST['login'];
 $senha_usu = $_POST['senha'];
 // A próxima linha é responsável pela conexão com

 $conn = mysqli_connect("localhost", "Natan",
"123456Mu", "4parkingweb") or die ("Sem conexão com o
servidor"); // A variavel $result executa o select da $query.
$query="SELECT * FROM cadastro_usuario WHERE
email_usu ='$email_usu' AND senha_usu='$senha_usu'";
$result = mysqli_query($conn,$query);

/* Logo abaixo temos um bloco com if e else,
verificando se a variável $result foi bem sucedida, ou
seja se ela estiver encontrado algum registro idêntico
o seu valor será igual ou maior que 1, se não, se não
tiver registros seu valor será 0. Dependendo do
resultado ele redirecionará para a página site.php ou
retornara para a página do formulário inicial para
que se possa tentar novamente realizar o login */
if(mysqli_num_rows ($result) > 0 ) {
 $_SESSION['login'] = $email_usu;
 $_SESSION['senha'] = $senha_usu;
 header('location:verificar.php');}
else{
 unset ($_SESSION['login']);
 unset ($_SESSION['senha']);
 header('location:../html/login.html');}
?>