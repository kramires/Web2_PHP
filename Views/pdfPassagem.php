<?php
session_start();
require_once '../Login/checkSession.php';
require_once '../DB/Database.php';
require_once '../mpdf60/mpdf.php';
require_once '../Model/Entidades/Pessoa.php';
require_once '../Model/DAO/PessoaDao.php';
require_once '../Model/Entidades/Aviao.php';
require_once '../Model/DAO/AviaoDao.php';
require_once '../Model/Entidades/Aeroporto.php';
require_once '../Model/DAO/AeroportoDao.php';
require_once '../Model/DAO/VooDao.php';
require_once '../Model/Entidades/Voo.php';
require_once '../Model/Entidades/Passagem.php';
require_once '../Model/DAO/PassagemDao.php';
require_once '../Model/Entidades/Cliente.php';
require_once '../Model/DAO/ClienteDao.php';
require_once '../Model/Entidades/Atendente.php';
require_once '../Model/DAO/AtendenteDao.php';
    

    $idtb_passagem = $_GET['id'];
    $passagem = new Passagem();
    $passagem->setIdtb_passagem($idtb_passagem);

//    $lista = array();
//    $conexao = new Database();
//    $pasDao = new PassagemDao($conexao->conecta());
//    $lista = $pasDao->buscarTodos();
   
    $mpdf = new mPDF('pt','A4');
    $mpdf->SetDisplayMode('fullpage');
    
    $html = "
    <table> 
       	<tr>
    		<td rowspan=3 width=23%><img src='../Imagens/asa_panair_1.png'></td>
    		
        </tr>
        <tr>
    		<td ></td>
    		<td whidht=100% > Pan Air Agência de Turismo </td>


        </tr>
        <tr>
    		<td ></td>
    		<td ></td>
        </tr>
        
    </table>
    <table>";
    $html .= "
            <tr>
                <td width=60%>" . $passagem->getCliente()->getPessoa()->getNome() . "</td>
                <td width=60%>" . $passagem->getCliente()->getPessoa()->getCpf() . "</td>
                <td width=60%>" . $passagem->getCliente()->getPessoa()->getPassaporte() . "</td>    
                <td width=60%>" . $passagem->getCliente()->getPessoa()->getNacionalidade() . "</td>
           </tr>
            <tr>
                <td width=23%>" . $passagem->getNumero() . "</td>
                <td width=60%>" . $passagem->getData() . "</td>
                <td width=23%>" . $passagem->getClasse() . "</td>
                <td width=23%>" . $passagem->getPoltrona() . "</td>
                <td width=23%>" . $passagem->getVoo()->getOrigem()->getCodigo() . "</td>
                <td width=23%>" . $passagem->getVoo()->getDestino()->getCodigo() . "</td>
                <td width=23%>" . $passagem->getPreco() . "</td>
                <td width=23%>" . $passagem->getAtendente()->getNome() . "</td>
            </tr>"; 
    

//    $objeto = new Passagem();
//    foreach ($lista as $objeto){
//
//        $html .= "
//            <tr>
//                <td width=60%>" . $objeto->getCliente()->getPessoa()->getNome() . "</td>
//                <td width=60%>" . $objeto->getCliente()->getPessoa()->getCpf() . "</td>
//                <td width=60%>" . $objeto->getCliente()->getPessoa()->getPassaporte() . "</td>    
//                <td width=60%>" . $objeto->getCliente()->getPessoa()->getNacionalidade() . "</td>
//            </tr>
//            <tr>
//                <td width=23%>" . $objeto->getNumero() . "</td>
//                <td width=60%>" . $objeto->getData() . "</td>
//                <td width=23%>" . $objeto->getClasse() . "</td>
//                <td width=23%>" . $objeto->getPoltrona() . "</td>
//                <td width=23%>" . $objeto->getVoo()->getOrigem()->getCodigo() . "</td>
//                <td width=23%>" . $objeto->getVoo()->getDestino()->getCodigo() . "</td>
//                <td width=23%>" . $objeto->getPreco() . "</td>
//                <td width=23%>" . $objeto->getAtendente()->getNome() . "</td>
//            </tr>"; 
//                
//    }
//    
    $html .= "
    </table>";    
    
    $html = utf8_encode($html);
    $mpdf->WriteHTML($html);
    
    date_default_timezone_set('America/Sao_Paulo');
    $datahoje = date('d/m/Y H:i', time());
    
    $rodape =  $datahoje .  '|{PAGENO}/{nb}| PanAir Agência de Turismo';
    $mpdf->SetFooter($rodape);
    
    $mpdf->Output();
    
    exit;
?>