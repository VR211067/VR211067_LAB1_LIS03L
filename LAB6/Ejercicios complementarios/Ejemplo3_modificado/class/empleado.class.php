<?php
// Definición de la clase empleado
class empleado {
    private static $idEmpleado = 0;
    private $nombre;
    private $apellido;
    private $isss;
    private $renta;
    private $afp;
    private $prestamo;
    private $sueldoNominal;
    private $sueldoLiquido;
    private $pagoxhoraextra;

    const descISSS = 0.03;
    const descRENTA = 0.075;
    const descAFP = 0.0625;

    function __construct() {
        self::$idEmpleado++;
        $this->nombre = "";
        $this->apellido = "";
        $this->prestamo = 0.0;
        $this->sueldoLiquido = 0.0;
        $this->pagoxhoraextra = 0.0;
    }

    function __destruct() {
        echo "<p class=\"msg\">El salario y descuentos del empleado han sido calculados.</p>";
        $backlink = "<a class=\"a-btn\" href=\"sueldoneto.php\">";
        $backlink .= "<span class=\"a-btn-text\">Calcular salario </span>";
        $backlink .= "<span class=\"a-btn-slide-text\">a otro empleado</span>";
        $backlink .= "<span class=\"a-btn-slide-icon\"></span>";
        $backlink .= "</a>";
        echo $backlink;
    }

    function obtenerSalarioNeto($nombre, $apellido, $salario, $horasextras, $pagoxhoraextra = 0.0, $prestamo = 0.0) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->pagoxhoraextra = $horasextras * $pagoxhoraextra;
        $this->sueldoNominal = $salario;
        $this->prestamo = $prestamo;

        $totalIngreso = $salario + $this->pagoxhoraextra;

        $this->isss = $totalIngreso * self::descISSS;
        $this->afp = $totalIngreso * self::descAFP;

        $salariocondescuento = $totalIngreso - ($this->isss + $this->afp);

        if ($salariocondescuento > 2038.10) {
            $this->renta = $salariocondescuento * 0.3;
        } elseif ($salariocondescuento > 895.24) {
            $this->renta = $salariocondescuento * 0.2;
        } elseif ($salariocondescuento > 472.00) {
            $this->renta = $salariocondescuento * 0.1;
        } else {
            $this->renta = 0.0;
        }

        $totalDescuentos = $this->isss + $this->afp + $this->renta + $this->prestamo;
        $this->sueldoLiquido = $totalIngreso - $totalDescuentos;

        $this->imprimirBoletaPago();
    }

    function imprimirBoletaPago() {
        $tabla = "<table class='table'><tr>";
        $tabla .= "<td>Id empleado: </td><td>" . self::$idEmpleado . "</td></tr>";
        $tabla .= "<tr><td>Nombre empleado: </td><td>" . $this->nombre . " " . $this->apellido . "</td></tr>";
        $tabla .= "<tr><td>Salario nominal: </td><td>$ " . number_format($this->sueldoNominal, 2, '.', ',') . "</td></tr>";
        $tabla .= "<tr><td>Salario por horas extras: </td><td>$ " . number_format($this->pagoxhoraextra, 2, '.', ',') . "</td></tr>";
        $tabla .= "<tr class='success'><td colspan=\"2\"><h4>Descuentos</h4></td></tr>";
        $tabla .= "<tr><td>Descuento seguro social: </td><td>$ " . number_format($this->isss, 2, '.', ',') . "</td></tr>";
        $tabla .= "<tr><td>Descuento AFP: </td><td>$ " . number_format($this->afp, 2, '.', ',') . "</td></tr>";
        $tabla .= "<tr><td>Descuento renta: </td><td>$ " . number_format($this->renta, 2, '.', ',') . "</td></tr>";
        if ($this->prestamo > 0) {
            $tabla .= "<tr><td>Descuento préstamo: </td><td>$ " . number_format($this->prestamo, 2, '.', ',') . "</td></tr>";
        }
        $totalDescuentos = $this->isss + $this->afp + $this->renta + $this->prestamo;
        $tabla .= "<tr><td>Total descuentos: </td><td>$ " . number_format($totalDescuentos, 2, '.', ',') . "</td></tr>";
        $tabla .= "<tr><td>Sueldo líquido a pagar: </td><td>$ " . number_format($this->sueldoLiquido, 2, '.', ',') . "</td></tr>";
        $tabla .= "</table>";
        echo $tabla;
    }
}
?>
