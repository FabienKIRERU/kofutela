<style>    
    .contentFooter{
            display: flex;
            width: 100%;
        }
    @media screen and (max-width: 887px){
        .contentFooter{
            display: inline-block;
            max-width: 100%;
        }
        .section .welcome{
            min-width: 100%;
        }

    }
</style>
<div class="container text-secondary contentFooter" style="bottom:0; ">
    <div class="container">
        <img src="{{ asset('logo/papabailleur.png') }}" alt="" width="100px" class="d-flex m-2" style="border-radius: 50%">
        <div>
            <p>
                Papa Bailleur est une plateforme de transaction immobilière des ville de la RDC, qui vous facilite à avoir  
                votre demeure en simplifiant des effort parfois inutiles. Elle permet aux Propriétaires  (bailleur, agence immobilière, commisionnaire) de publier leurs biens: local, appartement, bureau, 
                logement, des depôt et bien d'autre. <br>
                Elle permet à la population de trouver facilement en un clic des appartement disponibles,
                sans perdre en temps, en argent, ... <br>
                Trouver où vous voulez vivre, est notre devoir.
            </p>
        </div>

    </div>
    <div class="container" >
        <div class="container m-3">
            <ul>
                <strong class="m-3">Trouvez votre demeure</strong>
                <li class="mt-2">
                    {{-- {{$property->category->name}} --}}
                    bureau
                </li>
                <li>Appartement</li>
                <li>Depôt</li>
                <li>Et bien D'autres</li>
            </ul>
            
        </div>
    </div>
    <div class="container">
        <div class="container m-3">
            <strong>
                Nous Contacter
            </strong>
            <div class="d-flex p-2">
                <div class="m-2">
                    <a href="sms:+243827871234" class="m-2 "><i class="fa-solid fa-comment-sms" style="font-size: 40px"></i></a>
                </div>
                <div class="m-2"> <a href="mailto:papabailleur@gmail.com"><i class="fa-solid fa-envelope text-danger" style="font-size: 40px;"></i></a></div>
                <div class="m-2"><a href="whatsapp://send?Hello, Papa Bailleur. ?&phone=+243827871234" class="m-2 "><i class="fa-brands fa-square-whatsapp" style="font-size: 40px; color: rgb(7, 168, 7)" ></i></a></div>
            </div>

        </div>
    </div>
</div>
<div style="text-align: center; color:white">
    <span>&copy; 2024 {{ config('app.name')}}</span>
</div>
<div style="text-align: center" class="m-2 text-secondary">
    <powered> Power by integrity </powered>
</div>