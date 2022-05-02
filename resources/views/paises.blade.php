<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paises</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" 
    integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Paises.css">
</head>
<body>
    <h1 style="text-align: center;">Paises De La Region </h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Pais</th>
                <th>Capital</th>
                <th>Moneda</th>
                <th>Poblacion (En Millones)</th>
                <th>Ciudades</th>

            </tr>
        </thead>
       <tbody>
           @foreach($paises as $pais => $infopais)
           <tr>
               <td rowspan='{{count ($infopais ["ciudades"])}}'>
                   <p style="color:blue;">{{$pais}}</p>
               </td>
               <td rowspan='{{count ($infopais ["ciudades"])}}'>
               <p style="color:red;">{{$infopais["Capital"]}}</p>
               </td>
               <td rowspan='{{count ($infopais ["ciudades"])}}'>
                   {{$infopais["Moneda"]}}
               </td>
               <td rowspan='{{count ($infopais ["ciudades"])}}'>
                   {{$infopais["Poblacion"]}}
               </td>
               @foreach($infopais ["ciudades"] as $ciudad)
               
               <td  style="background-color: green;">
                {{$ciudad}}
               </td>
               </tr>
               @endforeach()
         
           @endforeach()
       </tbody> 
       <tfoot></tfoot>
    </table>
</body>
</html>