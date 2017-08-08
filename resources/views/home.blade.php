@extends('layouts.frontend.Layout')

@section('content')
    <div>
        <div class="" >
            
            
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Profile / Tidjani Yannick</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="crette.jpg" class=" img-responsive"><h3 class="panel-title">Tidjani Yannick<a href="#"><i class="glyphicon glyphicon-edit"></i></a></h3> </div>
                        
                        <div class=" col-md-9 col-lg-9 col-sm-9">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Nom et prenom : </td>
                                    <td>Momo tesse yannick</td>
                                </tr>
                                <tr>
                                    <td>Status : </td>
                                    <td>Sportif Amateur</td>
                                </tr>
                                <tr>
                                    <td>Discipline : </td>
                                    <td>Football</td>
                                </tr>
                                <tr>
                                    <td>Nom de l'Agent/Agence </td>
                                    <td>Adrien Nickson</td>
                                </tr>
                                <tr>
                                    <td>Club Actuel</td>
                                    <td>Paris Saint Germain</td>
                                </tr>
                                
                                <tr>
                                    <td>Date de Naissance</td>
                                    <td>01/24/1988 -- 17 ans</td>
                                </tr>
                                
                                <tr>
                                    <td>Pays/Ville</td>
                                    <td>Cameroun - Douala</td>
                                </tr>
                                <tr>
                                    <td>Membre depuis : </td>
                                    <td>06/23/2013</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><a href="mailto:info@support.com">info@support.com</a></td>
                                </tr>
                                <tr>
                                    <td>Telephone : </td>
                                    <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                                    </td>
                                
                                </tr>
                                <tr>
                                    <td>Palmares : </td>
                                    <td>
                                        <ul class="nav">
                                            <li>2010 - 2011 : Lycee Bilingue d'Essos </li>
                                            <li>2011 - 2016 : Université de Dschang</li>
                                            <li>2016 - 2017 : Institut Universitaire de la Cote (CS2I-MSI)</li>
                                        </ul>
                                    </td>
                                
                                </tr>
                                
                                </tbody>
                            </table>
                            <!-- If(C le proprietaire du compte) -->
                            <a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Editer Mon Profile</a>
                            <a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i>  Envoyer un Message</a>
                            
                            <!-- } else { -->
                            
                            <a href="#" class="btn btn-primary"><i class="glyphicon glyphicon-envelope"></i>  Contacter</a>
                            <!--End if;-->
                            <br/><br />
                        </div>
                    </div>
                
                
                </div>
            </div>
        
        
        
        
        </div>
    </div>
    
@endsection
