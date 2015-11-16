<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<div class="row">
    <div class="col-xs-6 img-responsive thumbnail">
        <img src="/assets/data/img/{Photo}">
    </div>
    <div class="col-xs-6">
        {message}
        <form action ="/Player/validate" method="post">
            <input type="hidden" value="{Photo}"/>
            <input type="hidden" value="{ID}"/>
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
            {Submit}
            {Cancel}
            {Delete}
        </form>
    </div>
</div>
        

