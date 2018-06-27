<template>
<div>


<!--підприємство період майл------------------------------------------------------------------------------------------------------->
    <div class="row"  >
        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-3" >
            <h1>Підприємство <span style="color:#366e98;">{{name_firm}}</span></h1>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" >
            <h1 v-show="!after">round <span style="color:#366e98;"><p v-show="after">{{after_period+1}}</p></span></h1>
            <h1 v-show="after">Гра вже закінчилася</span></h1>
        </div>
        <div class="col-lg-5 col-md-3 col-sm-3 col-xs-3" >
            <h1>email <span style="color:#366e98;">{{mail}}</span></h1>
        </div>
    </div>

<!--button рышення результати---------------------------------------------------------------------------------------------------------->
    <div class="row"  >
        <div class="col-lg-5 col-md-3 col-sm-3 col-xs-3" >

        </div>
        <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" >
            <button v-on:click="solution_to_the_answer(true)">рішення</button>
        </div>
        <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" >
            <button v-on:click="solution_to_the_answer(false)">результати</button>
        </div>
    </div>

<!--button раунди---------------------------------------------------------------------------------------------------------->

    <div class="row"  >
        <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3" >
            <nav_bar_room :count_period="count_period" v-on:showm="showm"></nav_bar_room>
        </div>
        <div class="col-lg-11 col-md-3 col-sm-3 col-xs-3" >

<div v-if="solution_to_the_answerr" >

<div v-if="active">
<div v-if="after">



    <!-----1. ІННОВАЦІЇ ТА РОЗВИТОК----------------------------------------------------------------------------------------------------------------->
    <div class="row" >
        <div class="col-lg-12 col-md-3 col-sm-3 col-xs-2" >
            <div class="col-lg-12 col-md-3 col-sm-3 col-xs-2">
                <div class="box-header with-border" style="text-align:center">
                    <h3 class="box-title" >1. ІННОВАЦІЇ ТА РОЗВИТОК</h3>

                </div>
                <!-- /.box-header -->



                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">1.1. Купівля і/або продаж обладнання</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" >


                            <div  ><span style="color:#aa9aff;">1.1.1. Прийміть рішення щодо придбання/продажу агрегатів аміаку</span></div>
                            <div class="row" >
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Вітчизняного виробництва</p>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                        Придбати
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                        Продати
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Європейського виробництва</p>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                        Придбати
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                        Продати
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Японського виробництва</p>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                        Придбати
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                        Продати
                                    </div>
                                </div>

                            </div>
                            <!--//input-->
                            <div class="row"  >
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" v-for="row in ammoniaa" >
                                    <input type="text" class="form-control" v-model="row.value" disabled>
                                </div>
                            </div>


                            <div  ><span style="color:#aa9aff;">1.1.2. Прийміть рішення щодо придбання/продажу агрегатів з виробництва</span></div>
                            <div class="row" >
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Карбаміду</p>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                        Придбати
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                        Продати
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                    <p>	Аміачної селітри (АС)</p>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                        Придбати
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                        Продати
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                    <p>КАС</p>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                        Придбати
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                        Продати
                                    </div>
                                </div>

                            </div>
                            <!--//input-->
                            <div class="row"  >
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" v-for="row in equipmentt" >
                                    <input type="text" class="form-control" v-model="row.value" disabled>
                                </div>


                            </div>




                        </div>

                        <!-- /.content -->
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">1.2. Ремонт та модернізація агрегатів аміаку</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" >
                            <div class="row" >
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Вітчизняного виробництва</p>
                                    <div class="row" >
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                            Поточний ремонт
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                            Спрощений ремонт
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                            Капітальний ремонт
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" v-for="row in Repair_and_modernizationn[0]">

                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>


                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Європейського виробництва</p>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                        Поточний ремонт
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                        Спрощений ремонт
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                        Капітальний ремонт
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" v-for="row in Repair_and_modernizationn[1]">

                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Японського виробництва</p>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                        Поточний ремонт
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                        Спрощений ремонт
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                        Капітальний ремонт
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" v-for="row in Repair_and_modernizationn[2]">

                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">1.3. Управління персоналом</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!--/.box-header-->
                        <div class="box-body" >

                            <div class="row" >
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Найм</p>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Звільнення</p>

                                </div>

                            </div>
                            <!--//input-->
                            <div class="row"  >
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" v-for="row in HRr" >
                                    <input type="text" class="form-control" v-model="row.value" disabled>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>



                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">1.4. Розвиток дистибюторської мережі</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" >
                            <div class="row">

                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2" >
                                    <p>ЄС</p>
                                </div>

                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Північна Америка</p>
                                </div>

                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Південна Америка</p>
                                </div>

                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Азія</p>
                                </div>

                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Україна</p>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>Комісійні %</p>
                                </div>

                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" v-for="row in distributor_networkk">
                                    <input type="text" class="form-control" v-model="row.value" disabled>
                                </div>
                            </div>

                        </div>



                    </div>
                </div>
            </div>
        </div>








    </div>

    <!---------2. ПОСТАЧАННЯ------------------------------------------------------------------------------------------------------------->
    <div class="row" >
        <div class="col-lg-12 col-md-3 col-sm-3 col-xs-2" >
            <div class="">
                <div class="box-header with-border" style="text-align:center">
                    <h3 class="box-title" >2. ПОСТАЧАННЯ</h3>

                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">2.1. Прийміть рішення щодо придбання:</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>

                        <div class="box-body" >

                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                    <span style="font-weight:700;">Природного газу,</span>тис. м3
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                    <span style="font-weight:700;">Мішки 50 кг,</span> шт.
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                    <span style="font-weight:700;">Мішки типу Біг-бег,</span> шт.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" v-for="row in distributor_networkk">
                                    <input type="text" class="form-control" v-model="row.value" disabled>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!---------3. ВИРОБНИЦТВО------------------------------------------------------------------------------------------------------------->
    <div class="row" >
        <div class="col-lg-12 col-md-3 col-sm-3 col-xs-2" >
            <div class="">
                <div class="box-header with-border" style="text-align:center">
                    <h3 class="box-title" >3. ВИРОБНИЦТВО</h3>
                </div>





                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="box">
                        <div class="box-header with-border">


                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" >
                            <div class="row">
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2" >
                                    <p>АC</p>
                                </div>
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" >
                                    <p>КА</p>

                                </div>
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" >
                                    <p>КАС</p>

                                </div>
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Аміак</p>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>Обсяг в-ва, т</p>
                                </div>
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " v-for="row in PRODUCTION_Tt">
                                    <input type="text" class="form-control" v-model="row.value" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>Якість, сорт</p>
                                </div>
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " v-for="row in data_on_quality_of_ann">
                                    <input type="text" class="form-control" v-model="row.value" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>50-кг мішки, т</p>
                                </div>
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " v-for="row in packing_into_50kgg">
                                    <input type="text" class="form-control" v-model="row.value" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>Біг-Бег, т</p>
                                </div>
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " v-for="row in packing_into_big_bagss">
                                    <input type="text" class="form-control" v-model="row.value" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>Насип, т</p>
                                </div>
                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " v-for="row in packing_into_bulkk">
                                    <input type="text" class="form-control" v-model="row.value" disabled>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---------4. ПРОДАЖ ПРОДУКЦІЇ------------------------------------------------------------------------------------------------------------->
    <div class="row" >
        <div class="col-lg-12 col-md-3 col-sm-3 col-xs-2" >
            <div class="">
                <div class="box-header with-border" style="text-align:center">
                    <h3 class="box-title" >4. ПРОДАЖ ПРОДУКЦІЇ</h3>

                </div>
                <!-- /.box-header -->

                <p>Прийміть рішення щодо продажу:</p>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">4.1.Карбамід (КА)</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>

                        <div class="box-body" >

                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 col-lg-offset-3 " >
                                    <p>(50 -кг мішки)</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>(Біг-Беги)</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>(насип)</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 col-lg-offset-3 " >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Обсяг, т</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Ціна</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Валюта</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Обсяг, т</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Ціна</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Валюта</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Обсяг, т</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Ціна</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Валюта</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>ЄС</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_es_KAa[0]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>євро</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_es_KA[1]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>євро</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_es_KAa[2]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>євро</p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Пн Америка</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_na_KAa[0]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_na_KAa[1]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_na_KAa[2]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Пд Америка</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_sa_КAa[0]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_sa_КAa[1]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_sa_КAa[2]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Азія</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_asia_КAa[0]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_asia_КAa[1]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_asia_КAa[2]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Україна</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_uk_КAa[0]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_uk_КAa[1]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_uk_КAa[2]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">4.2.Аміачна селітра(АС)</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>

                        <div class="box-body" >

                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 col-lg-offset-3 " >
                                    <p>(50 -кг мішки)</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>(Біг-Беги)</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>(насип)</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 col-lg-offset-3 " >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Обсяг, т</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Ціна</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Валюта</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Обсяг, т</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Ціна</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Валюта</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Обсяг, т</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Ціна</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Валюта</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>ЄС</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_es_ACc[0]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>євро</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_es_ACc[1]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>євро</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_es_ACc[2]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>євро</p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Пн Америка</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_na_ACc[0]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_na_ACc[1]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_na_ACc[2]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Пд Америка</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_sa_ACc[0]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_sa_ACc[1]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_sa_ACc[2]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Азія</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_asia_ACc[0]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_asia_ACc[1]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_asia_ACc[2]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Україна</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_uk_ACc[0]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_uk_ACc[1]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_uk_ACc[2]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">4.3. КАС</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>

                        <div class="box-body" >

                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 col-lg-offset-3 " >
                                    <p>(50 -кг мішки)</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>(Біг-Беги)</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>(насип)</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 col-lg-offset-3 " >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Обсяг, т</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Ціна</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Валюта</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Обсяг, т</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Ціна</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Валюта</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Обсяг, т</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Ціна</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Валюта</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>ЄС</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_es_KACc[0]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>євро</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_es_KACc[1]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>євро</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_es_KACc[2]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>євро</p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Пн Америка</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_na_KACc[0]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_na_KACc[1]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_na_KACc[2]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Пд Америка</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_sa_KACc[0]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_sa_KACc[1]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_sa_KACc[2]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Азія</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_asia_KACc[0]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_asia_KACc[1]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_asia_KACc[2]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Україна</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_uk_KACc[0]" >
                                        {{row.name}}
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_uk_KACc[1]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_uk_KACc[2]" >
                                        <input type="text" class="form-control" v-model="row.value" disabled>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!---------------------------------------------------------------------------------------------------------------------->

</div>
<div v-else="">

<!-----1. ІННОВАЦІЇ ТА РОЗВИТОК----------------------------------------------------------------------------------------------------------------->
            <div class="row" >
                <div class="col-lg-12 col-md-3 col-sm-3 col-xs-2" >
                    <div class="col-lg-12 col-md-3 col-sm-3 col-xs-2">
                        <div class="box-header with-border" style="text-align:center">
                            <h3 class="box-title" >1. ІННОВАЦІЇ ТА РОЗВИТОК</h3>

                        </div>
                        <!-- /.box-header -->



                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >

                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">1.1. Купівля і/або продаж обладнання</h3>

                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>

                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body" >


                                        <div  ><span style="color:#aa9aff;">1.1.1. Прийміть рішення щодо придбання/продажу агрегатів аміаку</span></div>
                                        <div class="row" >
                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                                <p>Вітчизняного виробництва</p>
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                                    Придбати
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                                     Продати
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                                <p>Європейського виробництва</p>
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                                    Придбати
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                                    Продати
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                                <p>Японського виробництва</p>
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                                    Придбати
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                                    Продати
                                                </div>
                                            </div>

                                        </div>
                                        <!--//input-->
                                        <div class="row"  >
                                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" v-for="row in ammonia" >
                                                    <input type="text" class="form-control" v-model="row.value" >
                                                </div>
                                        </div>


                                        <div  ><span style="color:#aa9aff;">1.1.2. Прийміть рішення щодо придбання/продажу агрегатів з виробництва</span></div>
                                        <div class="row" >
                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                                <p>Карбаміду</p>
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                                    Придбати
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                                    Продати
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                                <p>	Аміачної селітри (АС)</p>
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                                    Придбати
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                                    Продати
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                                <p>КАС</p>
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                                    Придбати
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                                    Продати
                                                </div>
                                            </div>

                                        </div>
                                        <!--//input-->
                                        <div class="row"  >
                                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" v-for="row in equipment" >
                                                <input type="text" class="form-control" v-model="row.value" >
                                            </div>


                                        </div>




                                    </div>

                                    <!-- /.content -->
                                </div>
                                </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">1.2. Ремонт та модернізація агрегатів аміаку</h3>

                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                            </button>

                                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body" >
                                        <div class="row" >
                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                                <p>Вітчизняного виробництва</p>
                                                <div class="row" >
                                                     <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                                      Поточний ремонт
                                                     </div>
                                                     <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                                         Спрощений ремонт
                                                     </div>
                                                     <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                                         Капітальний ремонт
                                                      </div>
                                                </div>

                                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" v-for="row in Repair_and_modernization[0]">

                                                         <input type="text" class="form-control" v-model="row.value" >
                                                    </div>


                                            </div>
                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                                <p>Європейського виробництва</p>
                                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                                    Поточний ремонт
                                                </div>
                                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                                    Спрощений ремонт
                                                </div>
                                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                                    Капітальний ремонт
                                                </div>
                                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" v-for="row in Repair_and_modernization[1]">

                                                    <input type="text" class="form-control" v-model="row.value" >
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                                <p>Японського виробництва</p>
                                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                                    Поточний ремонт
                                                </div>
                                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                                    Спрощений ремонт
                                                </div>
                                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                                    Капітальний ремонт
                                                </div>
                                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" v-for="row in Repair_and_modernization[2]">

                                                    <input type="text" class="form-control" v-model="row.value" >
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">1.3. Управління персоналом</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>

                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                 <!--/.box-header-->
                                <div class="box-body" >

                                    <div class="row" >
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                            <p>Найм</p>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >
                                            <p>Звільнення</p>

                                        </div>

                                    </div>
                                    <!--//input-->
                                    <div class="row"  >
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" v-for="row in HR" >
                                            <input type="text" class="form-control" v-model="row.value" >
                                        </div>
                                    </div>

                                </div>

                            </div>

                            </div>



                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                                  <div class="box">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">1.4. Розвиток дистибюторської мережі</h3>

                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                                </button>

                                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body" >
                                            <div class="row">

                                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2" >
                                                    <p>ЄС</p>
                                                </div>

                                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" >
                                                    <p>Північна Америка</p>
                                                </div>

                                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" >
                                                    <p>Південна Америка</p>
                                                </div>

                                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" >
                                                    <p>Азія</p>
                                                </div>

                                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" >
                                                    <p>Україна</p>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                                    <p>Комісійні %</p>
                                                </div>

                                                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" v-for="row in distributor_network">
                                                    <input type="text" class="form-control" v-model="row.value" >
                                                </div>
                                            </div>

                                        </div>



                                     </div>
                             </div>
        </div>
        </div>








 </div>

<!---------2. ПОСТАЧАННЯ------------------------------------------------------------------------------------------------------------->
            <div class="row" >
                <div class="col-lg-12 col-md-3 col-sm-3 col-xs-2" >
                     <div class="">
                         <div class="box-header with-border" style="text-align:center">
                            <h3 class="box-title" >2. ПОСТАЧАННЯ</h3>

                         </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                             <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">2.1. Прийміть рішення щодо придбання:</h3>

                                     <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>

                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>

                                 <div class="box-body" >

                                     <div class="row">
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                             <span style="font-weight:700;">Природного газу,</span>тис. м3
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                             <span style="font-weight:700;">Мішки 50 кг,</span> шт.
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >
                                             <span style="font-weight:700;">Мішки типу Біг-бег,</span> шт.
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" v-for="row in distributor_network">
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                     </div>

                                 </div>
                             </div>
                        </div>

                     </div>
                </div>
            </div>

<!---------3. ВИРОБНИЦТВО------------------------------------------------------------------------------------------------------------->
            <div class="row" >
                <div class="col-lg-12 col-md-3 col-sm-3 col-xs-2" >
                    <div class="">
                        <div class="box-header with-border" style="text-align:center">
                            <h3 class="box-title" >3. ВИРОБНИЦТВО</h3>
                        </div>





                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                <div class="box">
                    <div class="box-header with-border">


                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>

                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            <!-- /.box-header -->
                    <div class="box-body" >
                        <div class="row">
                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2" >
                            <p>АC</p>
                            </div>
                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" >
                        <p>КА</p>

                        </div>
                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" >
                        <p>КАС</p>

                        </div>
                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12" >
                        <p>Аміак</p>

                        </div>
                        </div>

                        <div class="row">
                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                <p>Обсяг в-ва, т</p>
                </div>
                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " v-for="row in PRODUCTION_T">
                    <input type="text" class="form-control" v-model="row.value">
                </div>
            </div>

                        <div class="row">
                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                <p>Якість, сорт</p>
                            </div>
                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " v-for="row in data_on_quality_of_an">
                                <input type="text" class="form-control" v-model="row.value">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                <p>50-кг мішки, т</p>
                            </div>
                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " v-for="row in packing_into_50kg">
                                <input type="text" class="form-control" v-model="row.value">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                <p>Біг-Бег, т</p>
                            </div>
                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " v-for="row in packing_into_big_bags">
                                <input type="text" class="form-control" v-model="row.value">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                <p>Насип, т</p>
                            </div>
                            <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " v-for="row in packing_into_bulk">
                                <input type="text" class="form-control" v-model="row.value">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
                    </div>
                </div>
            </div>

<!---------4. ПРОДАЖ ПРОДУКЦІЇ------------------------------------------------------------------------------------------------------------->
            <div class="row" >
                <div class="col-lg-12 col-md-3 col-sm-3 col-xs-2" >
                 <div class="">
                    <div class="box-header with-border" style="text-align:center">
                        <h3 class="box-title" >4. ПРОДАЖ ПРОДУКЦІЇ</h3>

                     </div>
            <!-- /.box-header -->

                <p>Прийміть рішення щодо продажу:</p>

                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >

                     <div class="box">
                          <div class="box-header with-border">
                                <h3 class="box-title">4.1.Карбамід (КА)</h3>

                                <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                          </div>

                        <div class="box-body" >

                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 col-lg-offset-3 " >
                                    <p>(50 -кг мішки)</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>(Біг-Беги)</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>(насип)</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 col-lg-offset-3 " >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                       <p>Обсяг, т</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Ціна</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Валюта</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Обсяг, т</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Ціна</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Валюта</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Обсяг, т</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Ціна</p>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Валюта</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>ЄС</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_es_KA[0]" >
                                        <input type="text" class="form-control" v-model="row.value">
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>євро</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_es_KA[1]" >
                                        <input type="text" class="form-control" v-model="row.value">
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>євро</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_es_KA[2]" >
                                        <input type="text" class="form-control" v-model="row.value">
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>євро</p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Пн Америка</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_na_KA[0]" >
                                        <input type="text" class="form-control" v-model="row.value">
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_na_KA[1]" >
                                        <input type="text" class="form-control" v-model="row.value">
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_na_KA[2]" >
                                        <input type="text" class="form-control" v-model="row.value">
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Пд Америка</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_sa_КA[0]" >
                                        <input type="text" class="form-control" v-model="row.value">
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_sa_КA[1]" >
                                        <input type="text" class="form-control" v-model="row.value">
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_sa_КA[2]" >
                                        <input type="text" class="form-control" v-model="row.value">
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Азія</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_asia_КA[0]" >
                                        <input type="text" class="form-control" v-model="row.value">
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_asia_КA[1]" >
                                        <input type="text" class="form-control" v-model="row.value">
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_asia_КA[2]" >
                                        <input type="text" class="form-control" v-model="row.value">
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <p>Україна</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_uk_КA[0]" >
                                        <input type="text" class="form-control" v-model="row.value">
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_uk_КA[1]" >
                                        <input type="text" class="form-control" v-model="row.value">
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_uk_КA[2]" >
                                        <input type="text" class="form-control" v-model="row.value">
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>дол.США</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                     </div>
                 </div>

                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                         <div class="box">
                             <div class="box-header with-border">
                                 <h3 class="box-title">4.2.Аміачна селітра(АС)</h3>

                                 <div class="box-tools pull-right">
                                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                     </button>

                                     <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                 </div>
                             </div>

                             <div class="box-body" >

                                 <div class="row">
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 col-lg-offset-3 " >
                                         <p>(50 -кг мішки)</p>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                         <p>(Біг-Беги)</p>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                         <p>(насип)</p>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 col-lg-offset-3 " >
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>Обсяг, т</p>
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>Ціна</p>
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>Валюта</p>
                                         </div>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>Обсяг, т</p>
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>Ціна</p>
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>Валюта</p>
                                         </div>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>Обсяг, т</p>
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>Ціна</p>
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>Валюта</p>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <p>ЄС</p>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_es_AC[0]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>євро</p>
                                         </div>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_es_AC[1]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>євро</p>
                                         </div>

                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_es_AC[2]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>євро</p>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="row">
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <p>Пн Америка</p>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_na_AC[0]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_na_AC[1]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>

                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_na_AC[2]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="row">
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <p>Пд Америка</p>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_sa_AC[0]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_sa_AC[1]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>

                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_sa_AC[2]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <p>Азія</p>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_asia_AC[0]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_asia_AC[1]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>

                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_asia_AC[2]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <p>Україна</p>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_uk_AC[0]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_uk_AC[1]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>

                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_uk_AC[2]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>
                                     </div>
                                 </div>

                             </div>
                         </div>
                     </div>

                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                         <div class="box">
                             <div class="box-header with-border">
                                 <h3 class="box-title">4.3. КАС</h3>

                                 <div class="box-tools pull-right">
                                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                     </button>

                                     <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                 </div>
                             </div>

                             <div class="box-body" >

                                 <div class="row">
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 col-lg-offset-3 " >
                                         <p>(50 -кг мішки)</p>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                         <p>(Біг-Беги)</p>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                         <p>(насип)</p>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 col-lg-offset-3 " >
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>Обсяг, т</p>
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>Ціна</p>
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>Валюта</p>
                                         </div>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>Обсяг, т</p>
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>Ціна</p>
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>Валюта</p>
                                         </div>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>Обсяг, т</p>
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>Ціна</p>
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>Валюта</p>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <p>ЄС</p>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_es_KAC[0]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>євро</p>
                                         </div>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_es_KAC[1]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>євро</p>
                                         </div>

                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_es_KAC[2]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>євро</p>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="row">
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <p>Пн Америка</p>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_na_KAC[0]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_na_KAC[1]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>

                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_na_KAC[2]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>
                                     </div>

                                 </div>
                                 <div class="row">
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <p>Пд Америка</p>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_sa_KAC[0]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_sa_KAC[1]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>

                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_sa_KAC[2]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <p>Азія</p>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_asia_KAC[0]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_asia_KAC[1]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>

                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_asia_KAC[2]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <p>Україна</p>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-4 col-xs-4 " v-for="row in sale_uk_KAC[0]" >

                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>
                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >

                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_uk_KAC[1]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>

                                     </div>
                                     <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " v-for="row in sale_uk_KAC[2]" >
                                             <input type="text" class="form-control" v-model="row.value">
                                         </div>
                                         <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >
                                             <p>дол.США</p>
                                         </div>
                                     </div>
                                 </div>

                             </div>
                         </div>
                     </div>

                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                         <div class="box">
                             <div class="box-header with-border">
                                 <h3 class="box-title">4.4.Реклама</h3>

                                 <div class="box-tools pull-right">
                                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                     </button>

                                     <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                 </div>
                             </div>

                             <div class="box-body" >

                                 <div class="row">
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 " >
                                         <p>ЄС</p>
                                     </div>
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                         <p>Північна Америка </p>
                                     </div>
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                         <p>Південна Америка</p>
                                     </div>
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                         <p>Азія</p>
                                     </div>
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                         <p>Україна</p>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12  " >
                                         <p>Інтернет</p>
                                     </div>
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " v-for="row in internet">
                                         <input type="text" class="form-control" v-model="row.value">
                                     </div>

                                 </div>
                                 <div class="row">
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12  " >
                                         <p>Телебачення</p>
                                     </div>
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " v-for="row in TV">
                                         <input type="text" class="form-control" v-model="row.value">
                                     </div>

                                 </div>
                                 <div class="row">
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12  " >
                                         <p>Преса</p>
                                     </div>
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " v-for="row in media">
                                         <input type="text" class="form-control" v-model="row.value">
                                     </div>

                                 </div>
                                 <div class="row">
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12  " >
                                         <p>Радіо</p>
                                     </div>
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " v-for="row in radio">
                                         <input type="text" class="form-control" v-model="row.value">
                                     </div>

                                 </div>
                                 <div class="row">
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12  " >
                                         <p>Журнали</p>
                                     </div>
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " v-for="row in spec_magazin">
                                         <input type="text" class="form-control" v-model="row.value">
                                     </div>

                                 </div>
                                 <div class="row">
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12  " >
                                         <p>Виставки</p>
                                     </div>
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " v-for="row in exhibitions">
                                         <input type="text" class="form-control" v-model="row.value">
                                     </div>

                                 </div>

                             </div>
                         </div>
                     </div>

                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                         <div class="box">
                             <div class="box-header with-border">
                                 <h3 class="box-title">4.5. Фрахтування суден, од.</h3>

                                 <div class="box-tools pull-right">
                                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                     </button>

                                     <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                 </div>
                             </div>

                             <div class="box-body" >

                                 <div class="row">


                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                         <p>ЄС</p>
                                     </div>
                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 " >
                                         <input type="text" class="form-control" v-model="chartering_of_vessels_to_eu">
                                     </div>

                                 </div>
                                 <div class="row">

                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                         <p>Північна Америка </p>
                                     </div>
                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 " >
                                         <input type="text" class="form-control" v-model="chartering_of_vessels_to_na">
                                     </div>

                                 </div>
                                 <div class="row">

                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                         <p>Південна Америка</p>
                                     </div>
                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 " >
                                         <input type="text" class="form-control" v-model="chartering_of_vessels_to_sa">
                                     </div>

                                 </div>
                                 <div class="row">

                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                         <p>Азія</p>
                                     </div>
                                     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 " >
                                         <input type="text" class="form-control" v-model="chartering_of_vessels_to_asia">
                                     </div>

                                 </div>



                             </div>
                         </div>
                     </div>

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                         <div class="box">
                             <div class="box-header with-border">
                                 <h3 class="box-title">4.6. Кредитування споживачів</h3>

                                 <div class="box-tools pull-right">
                                     <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                     </button>

                                     <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                 </div>
                             </div>

                             <div class="box-body" >
                                 <div class="row">
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 " >
                                         <p>ЄС</p>
                                     </div>
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                         <p>Північна Америка </p>
                                     </div>
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                         <p>Південна Америка</p>
                                     </div>
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                         <p>Азія</p>
                                     </div>
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                         <p>Україна</p>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                         <p>%</p>
                                     </div>
                                     <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 " >
                                         <input type="text" class="form-control" v-model="chartering_of_vessels_to_eu">
                                     </div>


                                 </div>




                             </div>
                         </div>
                     </div>

                 </div>
                </div>
            </div>

<!---------5. ФІНАНСИ------------------------------------------------------------------------------------------------------------->
    <div class="row" >
        <div class="col-lg-12 col-md-3 col-sm-3 col-xs-2" >
            <div class="">
                <div class="box-header with-border" style="text-align:center">
                    <h3 class="box-title" >5. ФІНАНСИ</h3>

                </div>
                <!-- /.box-header -->


                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">5.1. Депозити, грн.</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>

                        <div class="box-body" >

                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>Ставка</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>10%(2-періоди)</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>13%(3-періоди)</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>16%(4-періоди)</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p></p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " v-for="row in deposit">
                                    <input type="text" class="form-control" v-model="row.value">
                                </div>

                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">5.2. Кредити, грн.</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>

                        <div class="box-body" >

                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>Ставка</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>25%(3-періоди)</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>20%(5-періоди)</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>18%(7-періоди)</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p></p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " v-for="row in credit">
                                    <input type="text" class="form-control" v-model="row.value">
                                </div>

                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">5.3. Виплата дивідендів, %</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>

                        <div class="box-body" >



                            <div class="row">

                                    <input type="text" class="form-control" >


                            </div>


                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

<!--------6. АНАЛІТИЧНА ІНФОРМАЦІЯ ("30 000" - підтвердити; "0" -відхилити)------------------------------------------------------------------------------------------------------------->
    <div class="row" >
        <div class="col-lg-12 col-md-3 col-sm-3 col-xs-2" >
            <div class="">
                <div class="box-header with-border" style="text-align:center">
                    <h3 class="box-title" >6. АНАЛІТИЧНА ІНФОРМАЦІЯ ("30 000" - підтвердити; "0" -відхилити)</h3>

                </div>
                <!-- /.box-header -->


                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">6.1.</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>

                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>

                            <div class="box-body" >



                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Дані про обсяги виробництва</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_1[0].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Дані про пакування КА конкурентами</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_1[1].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Дані про пакування АС конкурентами</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_1[2].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Дані про пакування КАС</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_1[3].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">6.2.</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>

                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>

                            <div class="box-body" >



                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p> Дані про якість КА у конкурентів</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_2[0].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Дані про якість АС у конкурентів</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_2[2].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Дані про якість КАС у конкурентів</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_2[2].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>





                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">6.3.</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>

                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>

                            <div class="box-body" >



                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Динаміка цін на КА</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_3[0].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Динаміка цін на АС</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_3[1].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Динаміка цін на КАС</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_3[2].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Динаміка цін на аміак(NH3)</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_3[3].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>





                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">6.4.</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>

                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>

                            <div class="box-body" >



                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Сезонні індекси зміни ринкового попиту на:</p>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>- карбамід</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_4[0].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>- аміачну селітру</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_4[1].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p> КАС</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_4[2].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>- аміак</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_4[3].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>





                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">6.5.</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>

                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>

                            <div class="box-body" >



                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Обсяги продажу підприємств на ринках:</p>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>- карбамід</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_5[0].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>- аміачну селітру</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_5[1].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p> КАС</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_5[2].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>- аміак</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_5[3].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>





                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12" >

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">6.6.</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>

                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>

                            <div class="box-body" >





                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Дані про залишки нереалізован. КА</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_6[0].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Дані про залишки нереалізованої АC</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_6[1].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Дані про залишки нереалізован. КАC</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_6[2].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >
                                        <p>Дані про залишки нереалізован. NH3</p>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 " >

                                        <select v-model="t6_6[3].value">

                                            <option value="30 000">30 000</option>
                                            <option value="0">0</option>
                                        </select>
                                    </div>

                                </div>





                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">6.6.</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>

                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>

                        <div class="box-body" >





                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>Пряма реклама конкурентів</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >

                                    <select v-model="t6_7[0].value">

                                        <option value="30 000">30 000</option>
                                        <option value="0">0</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >
                                    <p>Непряма реклама (корпоративна)</p>
                                </div>
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 " >

                                    <select v-model="t6_7[1].value">

                                        <option value="30 000">30 000</option>
                                        <option value="0">0</option>
                                    </select>
                                </div>

                            </div>







                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

<!---------------------------------------------------------------------------------------------------------------------->
    <button v-on:click="ok">отправить</button>
</div>
</div>
    <div v-else="">
        <div v-if="active2">
            ще не почався цей період
        </div><div v-else="">
        нема даних за цей період
    </div>
    </div>









<!---------------------------------------------------------------------------------------------------------------------->
</div>
<div v-else="">
<div v-if="active">
    <!--2--------------------------------------------------------------------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Облік надходження та використання матеріалів на підприємстві</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['2_1']!=undefined">
                    <th v-for="row in testt['2_1'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['2_1']!=undefined">
                <tr v-for="(row,index) in testt['2_1']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Облік надходження та використання природного газу на підприємстві</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['2_2']!=undefined">
                    <th v-for="row in testt['2_2'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['2_1']!=undefined">
                <tr v-for="(row,index) in testt['2_2']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Графік погашення зобов'язань перед постачальниками за мішки</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['2_3']!=undefined">
                    <th v-for="row in testt['2_3'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['2_3']!=undefined">
                <tr v-for="(row,index) in testt['2_3']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Графік здійснення авансових платежів за природний газ (поставка через 30 днів)</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['2_4']!=undefined">
                    <th v-for="row in testt['2_4'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['2_4']!=undefined">
                <tr v-for="(row,index) in testt['2_4']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Графік здійснення авансових платежів за природний газ (поставка через 60 днів)</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['2_5']!=undefined">
                    <th v-for="row in testt['2_5'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['2_5']!=undefined">
                <tr v-for="(row,index) in testt['2_5']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Рух виробничих основних засобів на підприємстві</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['2_6']!=undefined">
                    <th v-for="row in testt['2_6'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['2_6']!=undefined">
                <tr v-for="(row,index) in testt['2_6']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->

       <!--3--------------------------------------------------------------------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Обсяги виробництва продукції підприємства</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['3_1']!=undefined">
                    <th v-for="row in testt['3_1'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['3_1']!=undefined">
                <tr v-for="(row,index) in testt['3_1']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Пакування продукції на підприємстві</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['3_2']!=undefined">
                    <th v-for="row in testt['3_2'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['3_1']!=undefined">
                <tr v-for="(row,index) in testt['3_2']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Виробнича собівартість продукції підприємства</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['3_3']!=undefined">
                    <th v-for="row in testt['3_3'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['3_3']!=undefined">
                <tr v-for="(row,index) in testt['3_3']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Рівень використання виробничих потужностей на підприємстві</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['3_4']!=undefined">
                    <th v-for="row in testt['3_4'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['3_4']!=undefined">
                <tr v-for="(row,index) in testt['3_4']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Облікова кількість бригад</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['3_5']!=undefined">
                    <th v-for="row in testt['3_5'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['3_5']!=undefined">
                <tr v-for="(row,index) in testt['3_5']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Планова потужність та фактичний рівень енерговитрат агрегатів аміаку</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['3_6']!=undefined">
                    <th v-for="row in testt['3_6'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['3_6']!=undefined">
                <tr v-for="(row,index) in testt['3_6']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->

 <!--4--------------------------------------------------------------------------------------------------------------------->
       <div class="box">
        <div class="box-header">
            <h3 class="box-title">Облік руху аміачної селітри на підприємстві</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_1']!=undefined">
                    <th v-for="row in testt['4_1'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_1']!=undefined">
                <tr v-for="(row,index) in testt['4_1']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Облік руху карбаміду на підприємстві</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_2']!=undefined">
                    <th v-for="row in testt['4_2'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_1']!=undefined">
                <tr v-for="(row,index) in testt['4_2']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Облік руху карбамідо-аміачної суміші на підприємстві</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_3']!=undefined">
                    <th v-for="row in testt['4_3'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_3']!=undefined">
                <tr v-for="(row,index) in testt['4_3']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Облік руху товарного аміаку</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_4']!=undefined">
                    <th v-for="row in testt['4_4'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_4']!=undefined">
                <tr v-for="(row,index) in testt['4_4']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Витрати на проведення рекламних заходів підприємства</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_5']!=undefined">
                    <th v-for="row in testt['4_5'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_5']!=undefined">
                <tr v-for="(row,index) in testt['4_5']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Деталізований облік руху АС (50 кг мішки) на регіональних ринках</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_6']!=undefined">
                    <th v-for="row in testt['4_6'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_6']!=undefined">
                <tr v-for="(row,index) in testt['4_6']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Деталізований облік руху АС (1000 кг мішки "Біг-Бег") на регіональних ринках</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_7']!=undefined">
                    <th v-for="row in testt['4_7'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_7']!=undefined">
                <tr v-for="(row,index) in testt['4_7']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Деталізований облік руху АС (насип) на регіональних ринках</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_8']!=undefined">
                    <th v-for="row in testt['4_8'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_8']!=undefined">
                <tr v-for="(row,index) in testt['4_8']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Деталізований облік руху КА (50 кг мішки) на регіональних ринках</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_9']!=undefined">
                    <th v-for="row in testt['4_9'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_9']!=undefined">
                <tr v-for="(row,index) in testt['4_9']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Деталізований облік руху КА (1000 кг мішки "Біг-Бег") на регіональних ринках</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_10']!=undefined">
                    <th v-for="row in testt['4_10'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_10']!=undefined">
                <tr v-for="(row,index) in testt['4_10']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Деталізований облік руху КА (насип) на регіональних ринках</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_11']!=undefined">
                    <th v-for="row in testt['4_11'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_11']!=undefined">
                <tr v-for="(row,index) in testt['4_11']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Деталізований облік руху КАС (50 кг мішки) на регіональних ринках</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_12']!=undefined">
                    <th v-for="row in testt['4_12'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_12']!=undefined">
                <tr v-for="(row,index) in testt['4_12']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Деталізований облік руху КАС (1000 кг мішки "Біг-Бег") на регіональних ринках</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_13']!=undefined">
                    <th v-for="row in testt['4_13'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_13']!=undefined">
                <tr v-for="(row,index) in testt['4_13']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Деталізований облік руху КАС (насип) на регіональних ринках</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_14']!=undefined">
                    <th v-for="row in testt['4_14'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_14']!=undefined">
                <tr v-for="(row,index) in testt['4_14']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Витрати на транспортування аміачної селітри на регіональні ринки світу</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_15']!=undefined">
                    <th v-for="row in testt['4_15'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_15']!=undefined">
                <tr v-for="(row,index) in testt['4_15']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Витрати на транспортування карбаміду на регіональні ринки світу</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_16']!=undefined">
                    <th v-for="row in testt['4_16'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_16']!=undefined">
                <tr v-for="(row,index) in testt['4_16']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Витрати на транспортування карбамідо-аміачної селітри на регіональні ринки світу</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_17']!=undefined">
                    <th v-for="row in testt['4_17'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_17']!=undefined">
                <tr v-for="(row,index) in testt['4_17']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Виручка від реалізації аміачної селітри на регіональних ринках (за курсом НБУ)</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_18']!=undefined">
                    <th v-for="row in testt['4_18'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_18']!=undefined">
                <tr v-for="(row,index) in testt['4_18']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Виручка від реалізації карбаміду на регіональних ринках (за курсом НБУ)</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_19']!=undefined">
                    <th v-for="row in testt['4_19'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_19']!=undefined">
                <tr v-for="(row,index) in testt['4_19']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Виручка від реалізації карбамідо-аміачної селітри на регіональних ринках (за курсом НБУ)</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_20']!=undefined">
                    <th v-for="row in testt['4_20'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_20']!=undefined">
                <tr v-for="(row,index) in testt['4_20']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Фрахтування суден</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['4_21']!=undefined">
                    <th v-for="row in testt['4_21'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['4_21']!=undefined">
                <tr v-for="(row,index) in testt['4_21']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!---------------------------------------------------------->

<!--5--------------------------------------------------------------------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Баланс підприємства</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['5_1']!=undefined">
                    <th v-for="row in testt['5_1'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['5_1']!=undefined">
                <tr v-for="(row,index) in testt['5_1']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Звіт про фінансові результати підприємства</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['5_2']!=undefined">
                    <th v-for="row in testt['5_2'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['5_2']!=undefined">
                <tr v-for="(row,index) in testt['5_2']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Звіт про рух грошових коштів підприємства</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['5_3']!=undefined">
                    <th v-for="row in testt['5_3'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['5_3']!=undefined">
                <tr v-for="(row,index) in testt['5_3']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Адміністративні витрати</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['5_4']!=undefined">
                    <th v-for="row in testt['5_4'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['5_4']!=undefined">
                <tr v-for="(row,index) in testt['5_4']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Продаж валюти</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['5_5']!=undefined">
                    <th v-for="row in testt['5_5'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['5_5']!=undefined">
                <tr v-for="(row,index) in testt['5_5']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Витрачання коштів на придбання cировини, матеріалів та енергетичних ресурсів</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['5_6']!=undefined">
                    <th v-for="row in testt['5_6'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['5_6']!=undefined">
                <tr v-for="(row,index) in testt['5_6']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Аналіз фінансової ліквідності підприємства</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['5_7']!=undefined">
                    <th v-for="row in testt['5_7'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['5_7']!=undefined">
                <tr v-for="(row,index) in testt['5_7']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
    <div class="box-header">
        <h3 class="box-title">Аналіз фінансової стійкості підприємства</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr  v-if="testt['5_8']!=undefined">
                <th v-for="row in testt['5_8'][0]">{{row}}</th>
            </tr>
            </thead>
            <tbody v-if="testt['5_8']!=undefined">
            <tr v-for="(row,index) in testt['5_8']" >
                <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

            </tr>


            </tbody>

        </table>
    </div>
    <!-- /.box-body -->
</div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Максимально-допустимі значення за кредитами</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['5_9']!=undefined">
                    <th v-for="row in testt['5_9'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['5_9']!=undefined">
                <tr v-for="(row,index) in testt['5_9']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>



<!--6--------------------------------------------------------------------------------------------------------------------->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Дані про обсяги виробництва (карбаміду (КА), аміачної селітри (АС), карбамідо-аміачної суміші (КАС), аміаку) конкурентів</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_1']!=undefined">
                    <th v-for="row in testt['6_1'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_1']!=undefined">
                <tr v-for="(row,index) in testt['6_1']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Дані про пакування АС конкурентами</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_2']!=undefined">
                    <th v-for="row in testt['6_2'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_2']!=undefined">
                <tr v-for="(row,index) in testt['6_2']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Дані про пакування КА конкурентами</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_3']!=undefined">
                    <th v-for="row in testt['6_3'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_3']!=undefined">
                <tr v-for="(row,index) in testt['6_3']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Дані про пакування КАС конкурентами</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_4']!=undefined">
                    <th v-for="row in testt['6_4'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_4']!=undefined">
                <tr v-for="(row,index) in testt['6_4']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Дані про якість АC у конкурентів</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_5']!=undefined">
                    <th v-for="row in testt['6_5'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_5']!=undefined">
                <tr v-for="(row,index) in testt['6_5']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Дані про якість КА у конкурентів</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_6']!=undefined">
                    <th v-for="row in testt['6_6'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_6']!=undefined">
                <tr v-for="(row,index) in testt['6_6']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Дані про якість КАС конкурентами</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_7']!=undefined">
                    <th v-for="row in testt['6_7'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_7']!=undefined">
                <tr v-for="(row,index) in testt['6_7']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Динаміка цін на АС</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_8_1']!=undefined">
                    <th v-for="row in testt['6_8_1'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_8_1']!=undefined">
                <tr v-for="(row,index) in testt['6_8_1']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Динаміка цін на АС</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_8_2']!=undefined">
                    <th v-for="row in testt['6_8_2'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_8_2']!=undefined">
                <tr v-for="(row,index) in testt['6_8_2']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Динаміка цін на АС</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_8_3']!=undefined">
                    <th v-for="row in testt['6_8_3'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_8_3']!=undefined">
                <tr v-for="(row,index) in testt['6_8_3']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Динаміка цін на КА</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_9_1']!=undefined">
                    <th v-for="row in testt['6_9_1'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_9_1']!=undefined">
                <tr v-for="(row,index) in testt['6_9_1']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Динаміка цін на КА</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_9_2']!=undefined">
                    <th v-for="row in testt['6_9_2'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_9_2']!=undefined">
                <tr v-for="(row,index) in testt['6_9_2']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Динаміка цін на КА</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_9_3']!=undefined">
                    <th v-for="row in testt['6_9_3'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_9_3']!=undefined">
                <tr v-for="(row,index) in testt['6_9_3']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Динаміка цін на КАС</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_10_1']!=undefined">
                    <th v-for="row in testt['6_10_1'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_10_1']!=undefined">
                <tr v-for="(row,index) in testt['6_10_1']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Динаміка цін на КАС</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_10_2']!=undefined">
                    <th v-for="row in testt['6_10_2'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_10_2']!=undefined">
                <tr v-for="(row,index) in testt['6_10_2']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Динаміка цін на КАС</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_10_3']!=undefined">
                    <th v-for="row in testt['6_10_3'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_10_3']!=undefined">
                <tr v-for="(row,index) in testt['6_10_3']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>



    <div class="box">
    <div class="box-header">
        <h3 class="box-title">Динаміка цін на аміак(NH3)</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr  v-if="testt['6_11']!=undefined">
                <th v-for="row in testt['6_11'][0]">{{row}}</th>
            </tr>
            </thead>
            <tbody v-if="testt['6_11']!=undefined">
            <tr v-for="(row,index) in testt['6_11']" >
                <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

            </tr>


            </tbody>

        </table>
    </div>
    <!-- /.box-body -->
</div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Сезонні індекси зміни ринкового попиту на АС</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_12']!=undefined">
                    <th v-for="row in testt['6_12'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_12']!=undefined">
                <tr v-for="(row,index) in testt['6_12']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Сезонні індекси зміни ринкового попиту на КА</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_13']!=undefined">
                    <th v-for="row in testt['6_13'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_13']!=undefined">
                <tr v-for="(row,index) in testt['6_13']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Сезонні індекси зміни ринкового попиту на КАC</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_14']!=undefined">
                    <th v-for="row in testt['6_14'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_14']!=undefined">
                <tr v-for="(row,index) in testt['6_14']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Сезонні індекси зміни ринкового попиту на NH3</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_15']!=undefined">
                    <th v-for="row in testt['6_15'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_15']!=undefined">
                <tr v-for="(row,index) in testt['6_15']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Обсяги продажу підприємств на ринках АС</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_16_1']!=undefined">
                    <th v-for="row in testt['6_16_1'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_16_1']!=undefined">
                <tr v-for="(row,index) in testt['6_16_1']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Обсяги продажу підприємств на ринках АС</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_16_2']!=undefined">
                    <th v-for="row in testt['6_16_2'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_16_2']!=undefined">
                <tr v-for="(row,index) in testt['6_16_2']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Обсяги продажу підприємств на ринках АС</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_16_3']!=undefined">
                    <th v-for="row in testt['6_16_3'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_16_3']!=undefined">
                <tr v-for="(row,index) in testt['6_16_3']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Обсяги продажу підприємств на ринках КА</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_17_1']!=undefined">
                    <th v-for="row in testt['6_17_1'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_17_1']!=undefined">
                <tr v-for="(row,index) in testt['6_17_1']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Обсяги продажу підприємств на ринках КА</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_17_2']!=undefined">
                    <th v-for="row in testt['6_17_2'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_17_2']!=undefined">
                <tr v-for="(row,index) in testt['6_17_2']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Обсяги продажу підприємств на ринках КА</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_17_3']!=undefined">
                    <th v-for="row in testt['6_17_3'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_17_3']!=undefined">
                <tr v-for="(row,index) in testt['6_17_3']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>



    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Обсяги продажу підприємств на ринках КАС</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_18_1']!=undefined">
                    <th v-for="row in testt['6_18_1'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_18_1']!=undefined">
                <tr v-for="(row,index) in testt['6_18_1']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Обсяги продажу підприємств на ринках КАС</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_18_2']!=undefined">
                    <th v-for="row in testt['6_18_2'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_18_2']!=undefined">
                <tr v-for="(row,index) in testt['6_18_2']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Обсяги продажу підприємств на ринках КАС</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_18_3']!=undefined">
                    <th v-for="row in testt['6_18_3'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_18_3']!=undefined">
                <tr v-for="(row,index) in testt['6_18_3']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Обсяги продажу підприємств на ринках аміаку</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_19']!=undefined">
                    <th v-for="row in testt['6_19'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_19']!=undefined">
                <tr v-for="(row,index) in testt['6_19']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Дані про обсяги нереалізованої продукції на ринках АС(50 кг. мішки) </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_20_1']!=undefined">
                    <th v-for="row in testt['6_20_1'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_20_1']!=undefined">
                <tr v-for="(row,index) in testt['6_20_1']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Дані про обсяги нереалізованої продукції на ринках АС(1000 кг. мішки)</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_21_2']!=undefined">
                    <th v-for="row in testt['6_21_2'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_21_2']!=undefined">
                <tr v-for="(row,index) in testt['6_21_2']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Дані про обсяги нереалізованої продукції на ринках АС(насип) </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr  v-if="testt['6_22_3']!=undefined">
                    <th v-for="row in testt['6_22_3'][0]">{{row}}</th>
                </tr>
                </thead>
                <tbody v-if="testt['6_22_3']!=undefined">
                <tr v-for="(row,index) in testt['6_22_3']" >
                    <td  v-for="ron in row" v-if="index!=0">{{ron}}</td>

                </tr>


                </tbody>

            </table>
        </div>
        <!-- /.box-body -->
    </div>

</div>
<div v-else="">
    <div v-if="active2">
     ще не почався цей період
    </div><div v-else="">
    нема даних за цей період
    </div>
</div>

                <!--<div class="box">-->
                    <!--<div class="box-header">-->
                        <!--<h3 class="box-title">Облік надходження та використання природного газу на підприємстві</h3>-->
                    <!--</div>-->
                    <!--&lt;!&ndash; /.box-header &ndash;&gt;-->
                    <!--<div class="box-body">-->
                        <!--<table id="example2" class="table table-bordered table-hover">-->
                            <!--<thead>-->
                            <!--<tr>-->
                                <!--<th v-for="row in test['2_2'][0]">{{row}}</th>-->
                            <!--</tr>-->
                            <!--</thead>-->
                            <!--<tbody >-->
                            <!--<tr v-for="(row,index) in test['2_2']">-->
                                <!--<td  v-for="ron in row" v-if="index!=0">{{ron}}</td>-->

                            <!--</tr>-->


                            <!--</tbody>-->

                        <!--</table>-->
                    <!--</div>-->
                    <!--&lt;!&ndash; /.box-body &ndash;&gt;-->
                <!--</div>-->

                <!--<div class="box">-->
                    <!--<div class="box-header">-->
                        <!--<h3 class="box-title">Графік погашення зобов'язань перед постачальниками за мішки</h3>-->
                    <!--</div>-->
                    <!--&lt;!&ndash; /.box-header &ndash;&gt;-->
                    <!--<div class="box-body">-->
                        <!--<table id="example2" class="table table-bordered table-hover">-->
                            <!--<thead>-->
                            <!--<tr>-->
                                <!--<th v-for="row in test['2_3'][0]">{{row}}</th>-->
                            <!--</tr>-->
                            <!--</thead>-->
                            <!--<tbody >-->
                            <!--<tr v-for="(row,index) in test['2_3']">-->
                                <!--<td  v-for="ron in row" v-if="index!=0">{{ron}}</td>-->

                            <!--</tr>-->


                            <!--</tbody>-->

                        <!--</table>-->
                    <!--</div>-->
                    <!--&lt;!&ndash; /.box-body &ndash;&gt;-->
                <!--</div>-->

                <!--<div class="box">-->
                    <!--<div class="box-header">-->
                        <!--<h3 class="box-title">Графік здійснення авансових платежів за природний газ (поставка через 30 днів)</h3>-->
                    <!--</div>-->
                    <!--&lt;!&ndash; /.box-header &ndash;&gt;-->
                    <!--<div class="box-body">-->
                        <!--<table id="example2" class="table table-bordered table-hover">-->
                            <!--<thead>-->
                            <!--<tr>-->
                                <!--<th v-for="row in test['2_4'][0]">{{row}}</th>-->
                            <!--</tr>-->
                            <!--</thead>-->
                            <!--<tbody >-->
                            <!--<tr v-for="(row,index) in test['2_4']">-->
                                <!--<td  v-for="ron in row" v-if="index!=0">{{ron}}</td>-->

                            <!--</tr>-->


                            <!--</tbody>-->

                        <!--</table>-->
                    <!--</div>-->
                    <!--&lt;!&ndash; /.box-body &ndash;&gt;-->
                <!--</div>-->

                <!--<div class="box">-->
                    <!--<div class="box-header">-->
                        <!--<h3 class="box-title">Графік здійснення авансових платежів за природний газ (поставка через 60 днів)</h3>-->
                    <!--</div>-->
                    <!--&lt;!&ndash; /.box-header &ndash;&gt;-->
                    <!--<div class="box-body">-->
                        <!--<table id="example2" class="table table-bordered table-hover">-->
                            <!--<thead>-->
                            <!--<tr>-->
                                <!--<th v-for="row in test['2_5'][0]">{{row}}</th>-->
                            <!--</tr>-->
                            <!--</thead>-->
                            <!--<tbody >-->
                            <!--<tr v-for="(row,index) in test['2_5']">-->
                                <!--<td  v-for="ron in row" v-if="index!=0">{{ron}}</td>-->

                            <!--</tr>-->


                            <!--</tbody>-->

                        <!--</table>-->
                    <!--</div>-->
                    <!--&lt;!&ndash; /.box-body &ndash;&gt;-->
                <!--</div>-->

                <!--<div class="box">-->
                    <!--<div class="box-header">-->
                        <!--<h3 class="box-title">Рух виробничих основних засобів на підприємстві</h3>-->
                    <!--</div>-->
                    <!--&lt;!&ndash; /.box-header &ndash;&gt;-->
                    <!--<div class="box-body">-->
                        <!--<table id="example2" class="table table-bordered table-hover">-->
                            <!--<thead>-->
                            <!--<tr>-->
                                <!--<th v-for="row in test['2_6'][0]">{{row}}</th>-->
                            <!--</tr>-->
                            <!--</thead>-->
                            <!--<tbody >-->
                            <!--<tr v-for="(row,index) in test['2_6']">-->
                                <!--<td  v-for="ron in row" v-if="index!=0">{{ron}}</td>-->

                            <!--</tr>-->


                            <!--</tbody>-->

                        <!--</table>-->
                    <!--</div>-->
                    <!--&lt;!&ndash; /.box-body &ndash;&gt;-->
                <!--</div>-->

            </div>
    </div>
</div>

</div>
</template>

<script>



    export default {
        props: ['periodd','count_periodd','sum_period','after_period','id_game','player_id','name_firm','mail','test'],
        data() {
            return {
                testt:[
//
                ],
                count_period:[],
                period:[],
                show:true,
                ammonia:[
                    {name:'_1_purchase_ammonia_equipment_of_ukr_m',value:''},
                    {name:'_2_sell_ammonia_equipment_of_ukr_m',value:''},
                    {name:'_3_purchase_ammonia_equipment_of_eu_m',value:''},
                    {name:'_4_sell_ammonia_equipment_of_eu_m',value:''},
                    {name:'_5_purchase_ammonia_equipment_of_the_japanese_m',value:''},
                    {name:'_6_sell_ammonia_equipment_of_the_japanese_m',value:''},
                ],
                ammoniaa:[
                    {name:'_1_purchase_ammonia_equipment_of_ukr_m',value:'1'},
                    {name:'_2_sell_ammonia_equipment_of_ukr_m',value:'1'},
                    {name:'_3_purchase_ammonia_equipment_of_eu_m',value:'1'},
                    {name:'_4_sell_ammonia_equipment_of_eu_m',value:'1'},
                    {name:'_5_purchase_ammonia_equipment_of_the_japanese_m',value:'1'},
                    {name:'_6_sell_ammonia_equipment_of_the_japanese_m',value:'1'},
                ],
                equipment:[
                    {name:'_7_purchase_equipment_for_an',value:''},
                    {name:'_8_sell_equipment_for_an',value:''},
                    {name:'_13_purchase_equipment_for_c',value:''},
                    {name:'_14_sell_equipment_for_c',value:''},
                    {name:'_19_purchase_equipment_for_uan',value:''},
                    {name:'_20_sell_equipment_for_uan',value:''},
                   ],
                equipmentt:[
                    {name:'_7_purchase_equipment_for_an',value:'2'},
                    {name:'_8_sell_equipment_for_an',value:'2'},
                    {name:'_13_purchase_equipment_for_c',value:'2'},
                    {name:'_14_sell_equipment_for_c',value:'2'},
                    {name:'_19_purchase_equipment_for_uan',value:'2'},
                    {name:'_20_sell_equipment_for_uan',value:'2'},
                ],
                Repair_and_modernization:[
                    [
                        {name:'_25_current_repair_equipment_ukr',value:''},
                        {name:'_26_simple_repair_equipment_ukr',value:''},
                        {name:'_27_full_repair_equipment_ukr',value:''},
                    ],
                    [
                        {name:'_28_current_repair_equipment_eu',value:''},
                        {name:'_29_simple_repair_equipment_eu',value:''},
                        {name:'_30_full_repair_equipment_eu',value:''}
                    ],
                    [
                        {name:'_31_current_repair_equipment_japan',value:''},
                        {name:'_32_simple_repair_equipment_japan',value:''},
                        {name:'_33_full_repair_equipment_japan',value:''}
                    ],


                ],
                Repair_and_modernizationn:[
                     [
                         {name:'_25_current_repair_equipment_ukr',value:'3'},
                         {name:'_26_simple_repair_equipment_ukr',value:'3'},
                         {name:'_27_full_repair_equipment_ukr',value:'3'},
                        ],
                     [
                         {name:'_28_current_repair_equipment_eu',value:'3'},
                         {name:'_29_simple_repair_equipment_eu',value:'3'},
                         {name:'_30_full_repair_equipment_eu',value:'3'}
                         ],
                     [
                         {name:'_31_current_repair_equipment_japan',value:'3'},
                         {name:'_32_simple_repair_equipment_japan',value:'3'},
                         {name:'_33_full_repair_equipment_japan',value:'3'}
                         ],


                ],
                HR:[
                    {name:'_34_employment_of_team',value:''},
                    {name:'_35_dismissal_of_team',value:''},
                ],
                HRr:[
                    {name:'_34_employment_of_team',value:'4'},
                    {name:'_35_dismissal_of_team',value:'4'},
                ],
                distributor_network:[
                    {name: '_236_distribution_network_in_european',value:''},
                    {name: '_237_distribution_network_in_na',value:''},
                    {name: '_238_distribution_network_in_sa',value:''},
                    {name: '_239_distribution_network_in_asia',value:''},
                    {name: '_240_distribution_network_in_ukraine',value:''},
                ],
                distributor_networkk:[
                    {name: '_236_distribution_network_in_european',value:'5'},
                    {name: '_237_distribution_network_in_na',value:'5'},
                    {name: '_238_distribution_network_in_sa',value:'5'},
                    {name: '_239_distribution_network_in_asia',value:'5'},
                    {name: '_240_distribution_network_in_ukraine',value:'5'},
                ],
                PRODUCTION_T:[
                    {name:'_41_production_an',value:''},
                    {name:'_42_production_c',value:''},
                    {name:'_43_production_uan',value:''},
                    {name:'_44_production_ammonia',value:''},
                ],
                PRODUCTION_Tt:[
                    {name:'_41_production_an',value:''},
                    {name:'_42_production_c',value:''},
                    {name:'_43_production_uan',value:''},
                    {name:'_44_production_ammonia',value:''},
                ],
                data_on_quality_of_an:[
                    {name:'_64_data_on_quality_of_an',value:''},
                    {name:'_65_data_on_quality_of_c',value:''},
                    {name:'_66_data_on_quality_of_uan',value:''},
                ],
                data_on_quality_of_ann:[
                    {name:'_64_data_on_quality_of_an',value:''},
                    {name:'_65_data_on_quality_of_c',value:''},
                    {name:'_66_data_on_quality_of_uan',value:''},
                ],
                packing_into_50kg:[
                    {name:'_45_packing_an_into_50kg',value:''},
                    {name:'_48_packing_c_into_50kg',value:''},
                    {name:'_51_packing_uan_into_50kg',value:''},
                ],
                packing_into_50kgg:[
                    {name:'_45_packing_an_into_50kg',value:''},
                    {name:'_48_packing_c_into_50kg',value:''},
                    {name:'_51_packing_uan_into_50kg',value:''},
                ],
                packing_into_big_bags:[
                    {name:'_46_packing_an_into_big_bags',value:''},
                    {name:'_49_packing_c_into_big_bags',value:''},
                    {name:'_52_packing_uan_into_big_bags',value:''},
                ],
                packing_into_big_bagss:[
                    {name:'_46_packing_an_into_big_bags',value:''},
                    {name:'_49_packing_c_into_big_bags',value:''},
                    {name:'_52_packing_uan_into_big_bags',value:''},
                ],
                packing_into_bulk:[
                    {name:'_47_an_bulk',value:''},
                    {name:'_50_c_bulk',value:''},
                    {name:'_53_uan_bulk',value:''},
                ],
                packing_into_bulkk:[
                    {name:'_47_an_bulk',value:''},
                    {name:'_50_c_bulk',value:''},
                    {name:'_53_uan_bulk',value:''},
                ],

                sale_es_KA:[
                    [
                        {name:'_101_transport_vol_c_to_eu_50kg_bags',value:''},
                        {name:'_104_prices_c_50kg_bags_on_eu',value:''},
                    ],
                    [
                        {name:'_102_transport_vol_c_to_eu_1000kg_bags',value:''},
                        {name:'_105_prices_c_1000kg_bags_on_eu',value:''},
                    ],
                    [
                        {name:'_103_transport_vol_of_bulk_c_to_eu',value:''},
                        {name:'_106_prices_for_bulk_c_on_eu',value:''},
                    ],
                ],
                sale_na_KA:[
                    [
                        {name:'_107_transport_vol_c_to_na_50kg_bags',value:''},
                        {name:'_110_prices_c_50kg_bags_on_na',value:''},

                    ],
                    [
                        {name:'_108_transport_vol_c_to_na_1000kg_bags',value:''},
                        {name:'_111_prices_c_1000kg_bags_on_na',value:''},
                    ],
                    [
                        {name:'_109_transport_vol_of_bulk_c_to_na',value:''},
                        {name:'_112_prices_for_bulk_c_on_na',value:''},
                    ],
                ],
                sale_sa_КA:[
                    [
                        {name:'_113_transport_vol_c_to_sa_50kg_bags',value:''},
                        {name:'_116_prices_c_50kg_bags_on_sa',value:''},

                    ],
                    [
                        {name:'_114_transport_vol_c_to_sa_1000kg_bags',value:''},
                        {name:'_117_prices_c_1000kg_bags_on_sa',value:''},
                    ],
                    [
                        {name:'_115_transport_vol_of_bulk_c_to_sa',value:''},
                        {name:'_118_prices_for_bulk_c_on_sa',value:''},
                    ],
                ],
                sale_asia_КA:[
                    [
                        {name:'_119_transport_vol_c_to_asia_50kg_bags',value:''},
                        {name:'_122_prices_c_50kg_bags_on_asia',value:''},

                    ],
                    [
                        {name:'_120_transport_vol_c_to_asia_1000kg_bags',value:''},
                        {name:'_123_prices_c_1000kg_bags_on_asia',value:''},
                    ],
                    [
                        {name:'_121_transport_vol_of_bulk_c_to_asia',value:''},
                        {name:'_124_prices_for_bulk_c_on_asia',value:''},
                    ],
                ],
                sale_uk_КA:[
                    [
                        {name:'_125_transport_vol_c_to_ukr_50kg_bags',value:''},
                        {name:'_128_prices_c_50kg_bags_on_ukr',value:''},

                    ],
                    [
                        {name:'_126_transport_vol_c_to_ukr_1000kg_bags',value:''},
                        {name:'_129_prices_c_1000kg_bags_on_ukr',value:''},
                    ],
                    [
                        {name:'_127_transport_vol_of_bulk_c_to_ukr',value:''},
                        {name:'_130_prices_for_bulk_c_on_ukr',value:''},
                    ],
                ],
                sale_es_KAa:[
                    [
                        {name:'_101_transport_vol_c_to_eu_50kg_bags',value:''},
                        {name:'_104_prices_c_50kg_bags_on_eu',value:''},
                    ],
                    [
                        {name:'_102_transport_vol_c_to_eu_1000kg_bags',value:''},
                        {name:'_105_prices_c_1000kg_bags_on_eu',value:''},
                    ],
                    [
                        {name:'_103_transport_vol_of_bulk_c_to_eu',value:''},
                        {name:'_106_prices_for_bulk_c_on_eu',value:''},
                    ],
                ],
                sale_na_KAa:[
                    [
                        {name:'_107_transport_vol_c_to_na_50kg_bags',value:''},
                        {name:'_110_prices_c_50kg_bags_on_na',value:''},

                    ],
                    [
                        {name:'_108_transport_vol_c_to_na_1000kg_bags',value:''},
                        {name:'_111_prices_c_1000kg_bags_on_na',value:''},
                    ],
                    [
                        {name:'_109_transport_vol_of_bulk_c_to_na',value:''},
                        {name:'_112_prices_for_bulk_c_on_na',value:''},
                    ],
                ],
                sale_sa_КAa:[
                    [
                        {name:'_113_transport_vol_c_to_sa_50kg_bags',value:''},
                        {name:'_116_prices_c_50kg_bags_on_sa',value:''},

                    ],
                    [
                        {name:'_114_transport_vol_c_to_sa_1000kg_bags',value:''},
                        {name:'_117_prices_c_1000kg_bags_on_sa',value:''},
                    ],
                    [
                        {name:'_115_transport_vol_of_bulk_c_to_sa',value:''},
                        {name:'_118_prices_for_bulk_c_on_sa',value:''},
                    ],
                ],
                sale_asia_КAa:[
                    [
                        {name:'_119_transport_vol_c_to_asia_50kg_bags',value:''},
                        {name:'_122_prices_c_50kg_bags_on_asia',value:''},

                    ],
                    [
                        {name:'_120_transport_vol_c_to_asia_1000kg_bags',value:''},
                        {name:'_123_prices_c_1000kg_bags_on_asia',value:''},
                    ],
                    [
                        {name:'_121_transport_vol_of_bulk_c_to_asia',value:''},
                        {name:'_124_prices_for_bulk_c_on_asia',value:''},
                    ],
                ],
                sale_uk_КAa:[
                    [
                        {name:'_125_transport_vol_c_to_ukr_50kg_bags',value:''},
                        {name:'_128_prices_c_50kg_bags_on_ukr',value:''},

                    ],
                    [
                        {name:'_126_transport_vol_c_to_ukr_1000kg_bags',value:''},
                        {name:'_129_prices_c_1000kg_bags_on_ukr',value:''},
                    ],
                    [
                        {name:'_127_transport_vol_of_bulk_c_to_ukr',value:''},
                        {name:'_130_prices_for_bulk_c_on_ukr',value:''},
                    ],
                ],

                sale_es_AC:[
                    [
                        {name:'_131_transport_vol_an_to_eu_50kg_bags',value:''},
                        {name:'_134_prices_an_50kg_bags_on_eu',value:''},
                    ],
                    [
                        {name:'_132_transport_vol_an_to_eu_1000kg_bags',value:''},
                        {name:'_135_prices_an_1000kg_bags_on_eu',value:''},
                    ],
                    [
                        {name:'_133_transport_vol_of_bulk_an_to_eu',value:''},
                        {name:'_136_prices_for_bulk_an_on_eu',value:''},
                    ],
                ],
                sale_na_AC:[
                    [
                        {name:'_137_transport_vol_an_to_na_50kg_bags',value:''},
                        {name:'_140_prices_an_50kg_bags_on_na',value:''},

                    ],
                    [
                        {name:'_138_transport_vol_an_to_na_1000kg_bags',value:''},
                        {name:'_141_prices_an_1000kg_bags_on_na',value:''},
                    ],
                    [
                        {name:'_139_transport_vol_of_bulk_an_to_na',value:''},
                        {name:'_142_prices_for_bulk_an_on_na',value:''},
                    ],
                ],
                sale_sa_AC:[
                    [
                        {name:'_143_transport_vol_an_to_sa_50kg_bags',value:''},
                        {name:'_146_prices_an_50kg_bags_on_sa',value:''},

                    ],
                    [
                        {name:'_144_transport_vol_an_to_sa_1000kg_bags',value:''},
                        {name:'_147_prices_an_1000kg_bags_on_sa',value:''},
                    ],
                    [
                        {name:'_145_transport_vol_of_bulk_an_to_sa',value:''},
                        {name:'_148_prices_for_bulk_an_on_sa',value:''},
                    ],
                ],
                sale_asia_AC:[
                    [
                        {name:'_149_transport_vol_an_to_asia_50kg_bags',value:''},
                        {name:'_152_prices_an_50kg_bags_on_asia',value:''},

                    ],
                    [
                        {name:'_150_transport_vol_an_to_asia_1000kg_bags',value:''},
                        {name:'_153_prices_an_1000kg_bags_on_asia',value:''},
                    ],
                    [
                        {name:'_151_transport_vol_of_bulk_an_to_asia',value:''},
                        {name:'_154_prices_for_bulk_an_on_asia',value:''},
                    ],
                ],
                sale_uk_AC:[
                    [
                        {name:'_155_transport_vol_an_to_ukr_50kg_bags',value:''},
                        {name:'_158_prices_an_50kg_bags_on_ukr',value:''},

                    ],
                    [
                        {name:'_156_transport_vol_an_to_ukr_1000kg_bags',value:''},
                        {name:'_159_prices_an_1000kg_bags_on_ukr',value:''},
                    ],
                    [
                        {name:'_157_transport_vol_of_bulk_an_to_ukr',value:''},
                        {name:'_160_prices_for_bulk_an_on_ukr',value:''},
                    ],
                ],

                sale_es_ACc:[
                    [
                        {name:'_131_transport_vol_an_to_eu_50kg_bags',value:''},
                        {name:'_134_prices_an_50kg_bags_on_eu',value:''},
                    ],
                    [
                        {name:'_132_transport_vol_an_to_eu_1000kg_bags',value:''},
                        {name:'_135_prices_an_1000kg_bags_on_eu',value:''},
                    ],
                    [
                        {name:'_133_transport_vol_of_bulk_an_to_eu',value:''},
                        {name:'_136_prices_for_bulk_an_on_eu',value:''},
                    ],
                ],
                sale_na_ACc:[
                    [
                        {name:'_137_transport_vol_an_to_na_50kg_bags',value:''},
                        {name:'_140_prices_an_50kg_bags_on_na',value:''},

                    ],
                    [
                        {name:'_138_transport_vol_an_to_na_1000kg_bags',value:''},
                        {name:'_141_prices_an_1000kg_bags_on_na',value:''},
                    ],
                    [
                        {name:'_139_transport_vol_of_bulk_an_to_na',value:''},
                        {name:'_142_prices_for_bulk_an_on_na',value:''},
                    ],
                ],
                sale_sa_ACc:[
                    [
                        {name:'_143_transport_vol_an_to_sa_50kg_bags',value:''},
                        {name:'_146_prices_an_50kg_bags_on_sa',value:''},

                    ],
                    [
                        {name:'_144_transport_vol_an_to_sa_1000kg_bags',value:''},
                        {name:'_147_prices_an_1000kg_bags_on_sa',value:''},
                    ],
                    [
                        {name:'_145_transport_vol_of_bulk_an_to_sa',value:''},
                        {name:'_148_prices_for_bulk_an_on_sa',value:''},
                    ],
                ],
                sale_asia_ACc:[
                    [
                        {name:'_149_transport_vol_an_to_asia_50kg_bags',value:''},
                        {name:'_152_prices_an_50kg_bags_on_asia',value:''},

                    ],
                    [
                        {name:'_150_transport_vol_an_to_asia_1000kg_bags',value:''},
                        {name:'_153_prices_an_1000kg_bags_on_asia',value:''},
                    ],
                    [
                        {name:'_151_transport_vol_of_bulk_an_to_asia',value:''},
                        {name:'_154_prices_for_bulk_an_on_asia',value:''},
                    ],
                ],
                sale_uk_ACc:[
                    [
                        {name:'_155_transport_vol_an_to_ukr_50kg_bags',value:''},
                        {name:'_158_prices_an_50kg_bags_on_ukr',value:''},

                    ],
                    [
                        {name:'_156_transport_vol_an_to_ukr_1000kg_bags',value:''},
                        {name:'_159_prices_an_1000kg_bags_on_ukr',value:''},
                    ],
                    [
                        {name:'_157_transport_vol_of_bulk_an_to_ukr',value:''},
                        {name:'_160_prices_for_bulk_an_on_ukr',value:''},
                    ],
                ],


                sale_es_KAC:[
                    [
                        {name:'_161_transport_vol_uan_to_eu_50kg_bags',value:''},
                        {name:'_164_prices_uan_50kg_bags_on_eu',value:''},
                    ],
                    [
                        {name:'_162_transport_vol_uan_to_eu_1000kg_bags',value:''},
                        {name:'_165_prices_uan_1000kg_bags_on_eu',value:''},
                    ],
                    [
                        {name:'_163_transport_vol_of_bulk_uan_to_eu',value:''},
                        {name:'_166_prices_for_bulk_uan_on_eu',value:''},
                    ],
                ],
                sale_na_KAC:[
                    [
                        {name:'_167_transport_vol_uan_to_na_50kg_bags',value:''},
                        {name:'_170_prices_uan_50kg_bags_on_na',value:''},

                    ],
                    [
                        {name:'_168_transport_vol_uan_to_na_1000kg_bags',value:''},
                        {name:'_171_prices_uan_1000kg_bags_on_na',value:''},
                    ],
                    [
                        {name:'_169_transport_vol_of_bulk_uan_to_na',value:''},
                        {name:'_172_prices_for_bulk_uan_on_na',value:''},
                    ],
                ],
                sale_sa_KAC:[
                    [
                        {name:'_173_transport_vol_uan_to_sa_50kg_bags',value:''},
                        {name:'176_prices_uan_50kg_bags_on_sa',value:''},

                    ],
                    [
                        {name:'_174_transport_vol_uan_to_sa_1000kg_bags',value:''},
                        {name:'_177_prices_uan_1000kg_bags_on_sa',value:''},
                    ],
                    [
                        {name:'_175_transport_vol_of_bulk_uan_to_sa',value:''},
                        {name:'_178_prices_for_bulk_uan_on_sa',value:''},
                    ],
                ],
                sale_asia_KAC:[
                    [
                        {name:'179_transport_vol_uan_to_asia_50kg_bags',value:''},
                        {name:'_182_prices_uan_50kg_bags_on_asia',value:''},

                    ],
                    [
                        {name:'_180_transport_vol_uan_to_asia_1000kg_bags',value:''},
                        {name:'_183_prices_uan_1000kg_bags_on_asia',value:''},
                    ],
                    [
                        {name:'_181_transport_vol_of_bulk_uan_to_asia',value:''},
                        {name:'_184_prices_for_bulk_uan_on_asia',value:''},
                    ],
                ],
                sale_uk_KAC:[
                    [
                        {name:'_185_transport_vol_uan_to_ukr_50kg_bags',value:''},
                        {name:'_188_prices_uan_50kg_bags_on_ukr',value:''},

                    ],
                    [
                        {name:'_186_transport_vol_uan_to_ukr_1000kg_bags',value:''},
                        {name:'_189_prices_uan_1000kg_bags_on_ukr',value:''},
                    ],
                    [
                        {name:'_187_transport_vol_of_bulk_uan_to_ukr',value:''},
                        {name:'_190_prices_for_bulk_uan_on_ukr',value:''},
                    ],
                ],

                sale_es_KACc:[
                    [
                        {name:'_161_transport_vol_uan_to_eu_50kg_bags',value:''},
                        {name:'_164_prices_uan_50kg_bags_on_eu',value:''},
                    ],
                    [
                        {name:'_162_transport_vol_uan_to_eu_1000kg_bags',value:''},
                        {name:'_165_prices_uan_1000kg_bags_on_eu',value:''},
                    ],
                    [
                        {name:'_163_transport_vol_of_bulk_uan_to_eu',value:''},
                        {name:'_166_prices_for_bulk_uan_on_eu',value:''},
                    ],
                ],
                sale_na_KACc:[
                    [
                        {name:'_167_transport_vol_uan_to_na_50kg_bags',value:''},
                        {name:'_170_prices_uan_50kg_bags_on_na',value:''},

                    ],
                    [
                        {name:'_168_transport_vol_uan_to_na_1000kg_bags',value:''},
                        {name:'_171_prices_uan_1000kg_bags_on_na',value:''},
                    ],
                    [
                        {name:'_169_transport_vol_of_bulk_uan_to_na',value:''},
                        {name:'_172_prices_for_bulk_uan_on_na',value:''},
                    ],
                ],
                sale_sa_KACc:[
                    [
                        {name:'_173_transport_vol_uan_to_sa_50kg_bags',value:''},
                        {name:'176_prices_uan_50kg_bags_on_sa',value:''},

                    ],
                    [
                        {name:'_174_transport_vol_uan_to_sa_1000kg_bags',value:''},
                        {name:'_177_prices_uan_1000kg_bags_on_sa',value:''},
                    ],
                    [
                        {name:'_175_transport_vol_of_bulk_uan_to_sa',value:''},
                        {name:'_178_prices_for_bulk_uan_on_sa',value:''},
                    ],
                ],
                sale_asia_KACc:[
                    [
                        {name:'179_transport_vol_uan_to_asia_50kg_bags',value:''},
                        {name:'_182_prices_uan_50kg_bags_on_asia',value:''},

                    ],
                    [
                        {name:'_180_transport_vol_uan_to_asia_1000kg_bags',value:''},
                        {name:'_183_prices_uan_1000kg_bags_on_asia',value:''},
                    ],
                    [
                        {name:'_181_transport_vol_of_bulk_uan_to_asia',value:''},
                        {name:'_184_prices_for_bulk_uan_on_asia',value:''},
                    ],
                ],
                sale_uk_KACc:[
                    [
                        {name:'_185_transport_vol_uan_to_ukr_50kg_bags',value:''},
                        {name:'_188_prices_uan_50kg_bags_on_ukr',value:''},

                    ],
                    [
                        {name:'_186_transport_vol_uan_to_ukr_1000kg_bags',value:''},
                        {name:'_189_prices_uan_1000kg_bags_on_ukr',value:''},
                    ],
                    [
                        {name:'_187_transport_vol_of_bulk_uan_to_ukr',value:''},
                        {name:'_190_prices_for_bulk_uan_on_ukr',value:''},
                    ],
                ],


                consumer_lending:[
                    {name:'_91_consumer_lending_in_eu',value:''},
                    {name:'_92_consumer_lending_in_na',value:''},
                    {name:'_93_consumer_lending_in_sa',value:''},
                    {name:'_94_consumer_lending_in_asia',value:''},
                    {name:'_95_consumer_lending_in_ukr',value:''},
                ],
                consumer_lendingg:[
                    {name:'_91_consumer_lending_in_eu',value:''},
                    {name:'_92_consumer_lending_in_na',value:''},
                    {name:'_93_consumer_lending_in_sa',value:''},
                    {name:'_94_consumer_lending_in_asia',value:''},
                    {name:'_95_consumer_lending_in_ukr',value:''},
                ],

                internet:[
    {name:'_191_internet_advertising_eu',value:''},
    {name:'_197_internet_advertising_na_eu',value:''},
    {name:'_203_internet_advertising_sa',value:''},
    {name:'_209_internet_advertising_asia',value:''},
    {name:'_215_internet_advertising_ukr',value:''},
],
                internett:[
                    {name:'_191_internet_advertising_eu',value:''},
                    {name:'_197_internet_advertising_na_eu',value:''},
                    {name:'_203_internet_advertising_sa',value:''},
                    {name:'_209_internet_advertising_asia',value:''},
                    {name:'_215_internet_advertising_ukr',value:''},
                ],

                TV:[
                    {name:'_192_tv_advertising_ eu',value:''},
                    {name:'_198_tv_advertising_na',value:''},
                    {name:'_204_tv_advertising_sa',value:''},
                    {name:'_210_tv_advertising_asia',value:''},
                    {name:'_216_tv_advertising_ukr',value:''},
                ],
                TVv:[
                    {name:'_192_tv_advertising_ eu',value:''},
                    {name:'_198_tv_advertising_na',value:''},
                    {name:'_204_tv_advertising_sa',value:''},
                    {name:'_210_tv_advertising_asia',value:''},
                    {name:'_216_tv_advertising_ukr',value:''},
                ],

                media:[
                    {name:'_193_madia_eu',value:''},
                    {name:'_199_madia_na',value:''},
                    {name:'_205_madia_sa',value:''},
                    {name:'_211_madia_asia',value:''},
                    {name:'_217_madia_ukr_eu',value:''},
                ],
                mediaa:[
                    {name:'_193_madia_eu',value:''},
                    {name:'_199_madia_na',value:''},
                    {name:'_205_madia_sa',value:''},
                    {name:'_211_madia_asia',value:''},
                    {name:'_217_madia_ukr_eu',value:''},
                ],

                radio:[
                    {name:'_194_radio_eu',value:''},
                    {name:'_200_radio_na',value:''},
                    {name:'_206_radio_sa',value:''},
                    {name:'_212_radio_asia eu',value:''},
                    {name:'_218_radio_ukr',value:''},
                ],
                radioo:[
                    {name:'_194_radio_eu',value:''},
                    {name:'_200_radio_na',value:''},
                    {name:'_206_radio_sa',value:''},
                    {name:'_212_radio_asia eu',value:''},
                    {name:'_218_radio_ukr',value:''},
                ],

                spec_magazin:[
                    {name:'_195_spec_magazin_eu',value:''},
                    {name:'_201_spec_magazin_na',value:''},
                    {name:'_207_spec_magazin_sa eu',value:''},
                    {name:'_213_spec_magazin_asia',value:''},
                    {name:'_219_spec_magazin_ukr',value:''},
                ],
                spec_magazinn:[
                    {name:'_195_spec_magazin_eu',value:''},
                    {name:'_201_spec_magazin_na',value:''},
                    {name:'_207_spec_magazin_sa eu',value:''},
                    {name:'_213_spec_magazin_asia',value:''},
                    {name:'_219_spec_magazin_ukr',value:''},
                ],

                exhibitions:[
                    {name:'_196_exhibitions_eu',value:''},
                    {name:'_202_exhibitions_na eu',value:''},
                    {name:'_208_exhibitions_sa',value:''},
                    {name:'_214_exhibitions_asia',value:''},
                    {name:'_220_exhibitions_ukr',value:''},
                ],
                exhibitionss:[
                    {name:'_196_exhibitions_eu',value:''},
                    {name:'_202_exhibitions_na eu',value:''},
                    {name:'_208_exhibitions_sa',value:''},
                    {name:'_214_exhibitions_asia',value:''},
                    {name:'_220_exhibitions_ukr',value:''},
                ],

            chartering_of_vessels_to_eu:'',
            chartering_of_vessels_to_na:'',
            chartering_of_vessels_to_sa:'',
            chartering_of_vessels_to_asia:'',

                deposit:[
                    {name:'_54_deposit_for_2_periods',value:''},
                    {name:'_55_deposit_for_3_periods',value:''},
                    {name:'_56_deposit_for_4_periods',value:''},
                ],
                credit:[
                    {name:'_57_credit_for_3_periods',value:''},
                    {name:'_58_credit_for_5_periods',value:''},
                    {name:'_59_credit_for_7_periods',value:''},
                ],

                depositt:[
                    {name:'_54_deposit_for_2_periods',value:''},
                    {name:'_55_deposit_for_3_periods',value:''},
                    {name:'_56_deposit_for_4_periods',value:''},
                ],
                creditt:[
                    {name:'_57_credit_for_3_periods',value:''},
                    {name:'_58_credit_for_5_periods',value:''},
                    {name:'_59_credit_for_7_periods',value:''},
                ],
                t6_1:[
                {name:'_60_data_on_production',value:''},
                {name:'_61_data_on_packin_an',value:''},
                {name:'_62_data_on_packin_c',value:''},
                {name:'_63_data_on_packin_uan',value:''},
                ],

                t6_6:[
                    {name:'_79_data_on_surpluses_of_unsold_an',value:''},
                    {name:'_80_data_on_surpluses_of_unsold_c',value:''},
                    {name:'_81_data_on_surpluses_of_unsold_uan',value:''},
                    {name:'_82_data_on_surpluses_of_unsold_amm',value:''},
                ],

                t6_2:[
                    {name: '_241_quality_of_an',value:''},
                    {name: '_242_quality_of_c',value:''},
                    {name: '_243_quality_of_uan',value:''}
                ],

                t6_3:[

                    {name:'_67_movement_of_an_prices',value:''},
                    {name:'_68_movement_of_c_prices',value:''},
                    {name:'_69_movement_of_uan_prices',value:''},
                    {name:'_70_movement_of_ammonia_prices',value:''},
                ],


                t6_4:[

                    {name:'_71_seasonal_index_of_an',value:''},
                    {name:'_72_seasonal_index_of_c',value:''},
                    {name:'_73_seasonal_index_of_uan',value:''},
                    {name:'_74_seasonal_index_of_amm',value:''},
                ],

                t6_5:[

                    {name:'_75_sales_volume_on_the_an_market',value:''},
                    {name:'_76_sales_volume_on_the_c_market',value:''},
                    {name:'_77_sales_volume_on_the_uan_market',value:''},
                    {name:'_78_sales_volume_on_the_amm_market',value:''},
                ],

                t6_7:[

                    {name:'83_competitors_expenses_for_advertising',value:''},
                    {name:'84_competitors_expenses_for_advertising',value:''},

                ],
                data:[

                 {name:'_36_purchase_of_natural_gas_30days',value:''},
                 {name:'_37_purchase_of_natural_gas_60days',value:''},

                {name:'_39_purchase_of_50kg_bags',value:''},
                {name:'_40_purchase_of_big_bags',value:''},











           {name: '_226_transport_vol_of_marketable_ammonia',value:''},
           {name: '_227_price_for_ammonia eu',value:''},
           {name: '_228_dividends',value:''},
           {name: '_229_share_issue',value:''},
           {name: '_230_purchase_of_shares',value:''},


                ],
                i:1,
                q:1,
                active:true,
                active2:false,
                not_date:false,
                solution_to_the_answerr:false,

                after:false,
            }
        },


        methods: {
            solution_to_the_answer:function (value) {
                this.solution_to_the_answerr=value;
            },
            showm(data){
                if(this.solution_to_the_answerr){
                    if(data==this.after_period+1){
                        if (this.periodd[data] != undefined) {
                            this.ammonia = this.periodd[data]['ammonia'];
                            this.equipment = this.periodd[data]['equipment'];
                            this.Repair_and_modernization = this.periodd[data]['Repair_and_modernization'];
                            this.HR = this.periodd[data]['HR'];
                            this.distributor_network = this.periodd[data]['distributor_network'];

                        }
                        this.after=false;
                    }

                    if (this.periodd[data] != undefined) {
                        if(data<=this.after_period){
                            this.ammoniaa=this.periodd[data]['ammonia'];
                            this.equipmentt=this.periodd[data]['equipment'];
                            this.Repair_and_modernizationn=this.periodd[data]['Repair_and_modernization'];
                            this.HRr=this.periodd[data]['HR'];
                            this.distributor_networkk=this.periodd[data]['distributor_network'];



                            this.after=true;
                        }


                        this.active = true;

                    } else {
                        this.active = false;
                        if (data > this.after_period + 1) {
                            this.active2 = true;
                        } else {
                            this.active2 = false;
                        }
                        if(data==this.after_period+1){
                            this.active = true;
                        }
                    }

                }else {
                    if (this.test[data] != undefined) {
                        this.testt = this.test[data];
                        this.active = true;
                    } else {
                        this.active = false;
                        if (data > this.after_period + 1) {
                            this.active2 = true;
                        } else {
                            this.active2 = false;
                        }
                    }
                }
//              if (this.period[data]!=undefined){
//                  this.q=data;
//                  this.active2=false;
//
//
//              }else {
//                  this.active2=true;
//                  if(data<this.after_period+1){
//                      this.not_date=true;
//                  }else {
//                      this.not_date=false;
//                  }
//              }
//              if(this.after_period+1==data){
//                  this.active=true;
//              }else {
//                  this.active=false;
//              }
            },
            ok:function () {
               axios.post(`/user/register_game_in_room`, {
                   ammonia:this.ammonia,equipment:this.equipment,Repair_and_modernization:this.Repair_and_modernization,HR:this.HR,game_id:this.id_game,perioud_number:this.after_period+1,player_id:this.player_id
           }).then(response => {

alert(response.data);
               });
           },
            showw:function (index) {

                for(this.i;this.sum_period>=this.i;this.i++){

                  this.count_period[this.i].show=false;

                }
              this.count_period[index].show=true;
                this.i=1;
            }
        },
        created: function () {
            if (this.after_period < this.sum_period) {
                this.after = false;
            } else {
                this.after = true;
            }
            if (this.test[1] != undefined) {
                this.testt = this.test[1];
            }

            this.period = this.periodd;
            this.count_period = this.count_periodd;
            if (this.period[this.after_period + 1] != undefined) {
                this.data = this.period[this.after_period + 1].information_TIB;
            }

            if (this.sum_period <= this.after_period) {
                this.active = false;
            }
        }

//            for(this.i;this.period.length>this.i;this.i++){
//                    if(this.period[this.i].actionn==='true'){
//                        this.$set(this.period[this.i], 'action', 2);
//                    }else {
//                        this.$set(this.period[this.i], 'action', 3);
//                    }
//            }



    }
</script>


<!--&lt;!&ndash;<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >&ndash;&gt;-->
<!--&lt;!&ndash;<input type="text" class="form-control">&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->

<!--&lt;!&ndash;</div>&ndash;&gt;-->





<!--&lt;!&ndash;</div>&ndash;&gt;-->

<!--&lt;!&ndash;&lt;!&ndash; /.content &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--</div>-->
<!--</div>-->
<!--&lt;!&ndash;//-&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&ndash;&gt;-->

<!--&lt;!&ndash;//-&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&ndash;&gt;-->

<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<p>Обсяг, т</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>	Ціна</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>Валюта</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<p>Обсяг, т</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>	Ціна</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>Валюта</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<p>Обсяг, т</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>	Ціна</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>Валюта</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->

<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>дол.США</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>дол.США</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>дол.США</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>гривня</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->








<!--&lt;!&ndash;<div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >&ndash;&gt;-->
<!--&lt;!&ndash;<p>ЄС</p>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >&ndash;&gt;-->
<!--&lt;!&ndash;<p>(50 -кг мішки)</p>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >&ndash;&gt;-->
<!--&lt;!&ndash;<p>(Біг-Беги)</p>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >&ndash;&gt;-->
<!--&lt;!&ndash;<p>(насип)</p>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->



<!--</div>-->

<!--&lt;!&ndash; /.content &ndash;&gt;-->
<!--</div>-->
<!--</div>-->

<!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >-->

<!--<div class="box">-->
<!--<div class="box-header with-border">-->
<!--<h3 class="box-title">4.2.Аміачна селітра(АС)</h3>-->

<!--<div class="box-tools pull-right">-->
<!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>-->
<!--</button>-->

<!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
<!--</div>-->
<!--</div>-->
<!--&lt;!&ndash; /.box-header &ndash;&gt;-->
<!--<div class="box-body" >-->

<!--<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<br>-->
<!--</div>-->

<!--</div>-->
<!--<div class="row">-->

<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<br><br>-->
<!--</div>-->
<!--</div>-->

<!--<div class="row">-->
<!--<p>ЄС</p>-->
<!--</div>-->
<!--<div class="row">-->
<!--<p>Пн Америка</p>-->
<!--</div>-->
<!--<div class="row">-->
<!--<p>Пд Америка</p>-->
<!--</div>-->
<!--<div class="row">-->
<!--<p>Азія</p>-->
<!--</div>-->
<!--<br>-->
<!--<div class="row">-->
<!--<p>Україна</p>-->
<!--</div>-->

<!--</div>-->
<!--<div class="col-lg-11 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<p>(50 -кг мішки)</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>(Біг-Беги)</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>(насип)</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<p>Обсяг, т</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>	Ціна</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>Валюта</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<p>Обсяг, т</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>	Ціна</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>Валюта</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<p>Обсяг, т</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>	Ціна</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>Валюта</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->

<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>дол.США</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>дол.США</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>дол.США</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>гривня</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->








<!--&lt;!&ndash;<div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >&ndash;&gt;-->
<!--&lt;!&ndash;<p>ЄС</p>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >&ndash;&gt;-->
<!--&lt;!&ndash;<p>(50 -кг мішки)</p>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >&ndash;&gt;-->
<!--&lt;!&ndash;<p>(Біг-Беги)</p>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >&ndash;&gt;-->
<!--&lt;!&ndash;<p>(насип)</p>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->



<!--</div>-->

<!--&lt;!&ndash; /.content &ndash;&gt;-->
<!--</div>-->
<!--</div>-->

<!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >-->

<!--<div class="box">-->
<!--<div class="box-header with-border">-->
<!--<h3 class="box-title">4.3. КАС</h3>-->

<!--<div class="box-tools pull-right">-->
<!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>-->
<!--</button>-->

<!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
<!--</div>-->
<!--</div>-->
<!--&lt;!&ndash; /.box-header &ndash;&gt;-->
<!--<div class="box-body" >-->

<!--<div class="col-lg-1 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<br>-->
<!--</div>-->

<!--</div>-->
<!--<div class="row">-->

<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<br><br>-->
<!--</div>-->
<!--</div>-->

<!--<div class="row">-->
<!--<p>ЄС</p>-->
<!--</div>-->
<!--<div class="row">-->
<!--<p>Пн Америка</p>-->
<!--</div>-->
<!--<div class="row">-->
<!--<p>Пд Америка</p>-->
<!--</div>-->
<!--<div class="row">-->
<!--<p>Азія</p>-->
<!--</div>-->
<!--<br>-->
<!--<div class="row">-->
<!--<p>Україна</p>-->
<!--</div>-->

<!--</div>-->
<!--<div class="col-lg-11 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<p>(50 -кг мішки)</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>(Біг-Беги)</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>(насип)</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<p>Обсяг, т</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>	Ціна</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>Валюта</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<p>Обсяг, т</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>	Ціна</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>Валюта</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<p>Обсяг, т</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>	Ціна</p>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>Валюта</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->

<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>дол.США</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>дол.США</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>дол.США</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="row">-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>євро</p>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 "  >-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 " >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<input type="text" class="form-control">-->
<!--</div>-->
<!--<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" >-->
<!--<p>гривня</p>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->








<!--&lt;!&ndash;<div class="row">&ndash;&gt;-->
<!--&lt;!&ndash;<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >&ndash;&gt;-->
<!--&lt;!&ndash;<p>ЄС</p>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >&ndash;&gt;-->
<!--&lt;!&ndash;<p>(50 -кг мішки)</p>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >&ndash;&gt;-->
<!--&lt;!&ndash;<p>(Біг-Беги)</p>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12" >&ndash;&gt;-->
<!--&lt;!&ndash;<p>(насип)</p>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->



<!--</div>-->

<!--&lt;!&ndash; /.content &ndash;&gt;-->
<!--</div>-->
<!--</div>-->

<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--&lt;!&ndash;//-&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&ndash;&gt;-->









<!--&lt;!&ndash;<div  v-if="active">&ndash;&gt;-->
<!--&lt;!&ndash;<div class="row" v-for="ron in data" >&ndash;&gt;-->
<!--&lt;!&ndash;<div class="col-lg-4 col-md-3 col-sm-3 col-xs-3" >&ndash;&gt;-->
<!--&lt;!&ndash;<p>{{ron.name}}</p>&ndash;&gt;-->
<!--&lt;!&ndash;<input type="text" v-model="ron.value" >&ndash;&gt;-->


<!--&lt;!&ndash;</div>&ndash;&gt;-->


<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;<button v-on:click="ok">ok</button>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;<div v-else="">&ndash;&gt;-->
<!--&lt;!&ndash;&lt;!&ndash;&ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;<div v-if="!active2">&ndash;&gt;-->
<!--&lt;!&ndash;<div class="row" v-for="ron in period[q].information_TIB" >&ndash;&gt;-->
<!--&lt;!&ndash;<p>{{ron.name}}&#45;&#45;{{ron.value}}</p>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;<div v-else="">&ndash;&gt;-->
<!--&lt;!&ndash;<div v-if="not_date">&ndash;&gt;-->
<!--&lt;!&ndash;нет даных по даном раунде&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->
<!--&lt;!&ndash;<div v-else="">&ndash;&gt;-->
<!--&lt;!&ndash;еще не начался этот раунд&ndash;&gt;-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->