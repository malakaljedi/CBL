
@component('mail::message')
# Welcome to CBL An-Najah National University
In Palestine, we distinguish ourselves through our community based learning, which links our courses outcomes with 
real community needs. Therefore, An-Najah offers various social services to the Palestinian community in 
addition to its role as an academic institution. It also hosts several academic and cultural events that aim
at bridging gaps between the local community and its sectors.
The next step you need to accomplish, is filling out the course outline to determine whether your course can be integerated in the CBL program.




@component('mail::button', ['url' => ''])
Fill Outline
@endcomponent

Thanks,<br>
{{ config('name') }}
@endcomponent
