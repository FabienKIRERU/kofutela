

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
                Papa Bailleure est une plateforme pour la ville de Kinshasa qui vous facilite à avoir facilement votre demeure.
                Elle permet aux bailleur de publier leur appartement, pour le bureau, logement, des depôt et bien 
                d'autre. <br>
                Elle permet aux Kinois de trouver facilement un un clic des appartement disponible,
                sans perdre en temps, en argent, ... <br>
                trouver ou vous voulait vivre, est notre devoire
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