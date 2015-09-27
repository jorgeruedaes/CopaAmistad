<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jugador
 *
 * @author manchita
 */
class Jugador {
    //put your code here
    public $id_jugadores;
    public $nombre1;
    public $nombre2;
    public $apellido1;
    public $apellido2;
    public $fecha_nacimiento;
    public $email;
    public $equipo;
    public $fotojugador;
    public $fecha_ingreso;
    public $estado_jugador;
    public $telefono;
    public $profesion;
    function jugador() {
    }

    function getId_jugadores() {
        return $this->id_jugadores;
    }

    function getNombre1() {
        return $this->nombre1;
    }

    function getNombre2() {
        return $this->nombre2;
    }

    function getApellido1() {
        return $this->apellido1;
    }

    function getApellido2() {
        return $this->apellido2;
    }

    function getFecha_nacimiento() {
        return $this->fecha_nacimiento;
    }

    function getEmail() {
        return $this->email;
    }

    function getEquipo() {
        return $this->equipo;
    }

    function getFotojugador() {
        return $this->fotojugador;
    }

    function getFecha_ingreso() {
        return $this->fecha_ingreso;
    }

    function getEstado_jugador() {
        return $this->estado_jugador;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getProfesion() {
        return $this->profesion;
    }

    function setId_jugadores($id_jugadores) {
        $this->id_jugadores = $id_jugadores;
    }

    function setNombre1($nombre1) {
        $this->nombre1 = $nombre1;
    }

    function setNombre2($nombre2) {
        $this->nombre2 = $nombre2;
    }

    function setApellido1($apellido1) {
        $this->apellido1 = $apellido1;
    }

    function setApellido2($apellido2) {
        $this->apellido2 = $apellido2;
    }

    function setFecha_nacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setEquipo($equipo) {
        $this->equipo = $equipo;
    }

    function setFotojugador($fotojugador) {
        $this->fotojugador = $fotojugador;
    }

    function setFecha_ingreso($fecha_ingreso) {
        $this->fecha_ingreso = $fecha_ingreso;
    }

    function setEstado_jugador($estado_jugador) {
        $this->estado_jugador = $estado_jugador;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setProfesion($profesion) {
        $this->profesion = $profesion;
    }


}
