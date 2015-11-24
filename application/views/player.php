<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<div class="row">
    <div class="col-xs-6 thumbnail">
        <img src="/assets/data/img/{Photo}" class="playerViewThumb">
    </div>
    <div class="col-xs-6">
        <div style="
            color: red;
            font-weight: bold;
            font-size: 1.5em;
            ">
            {message}
        </div>
        <form action="/Player/validate" method="post">
            {Name}
            {PlayerNo}
            {Pos}
            {Status}
            {Height}
            {Weight}
            {Birthdate}
            {Experience}
            {College}
            {Code}
            <br>
            {Submit}{Cancel}{Delete}
        </form>
    </div>
</div>
        

