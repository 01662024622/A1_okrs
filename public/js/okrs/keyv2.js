$('.collapsed').on('click',function (){
    $(this).toggleClass('fa-caret-right fa-caret-down')
})
function test(){
    var html =`<div class="col-12 box-kpi">
            <div class="kpi-header">
                <i class="fa fa-caret-right collapsed" aria-hidden="true" data-toggle="collapse" data-target="#demo"></i> Phát triển hệ thống - Mức độ quan trọng: <b>Bình
                    Thường</b>
            </div>
            <div id="demo" class="kpi-body collapse">

                <div class="row kpi-detail kpi-header-title">
                    <div class="col-5 text-bold row">
                        <div class="col-10">KPI</div>
                        <div class="col-2">Độ khó</div>
                    </div>
                    <div class="col-1 text-bold">Loại</div>
                    <div class="col-6 text-bold row">
                        <span class="col kpi-month">T1</span>
                        <span class="col kpi-month">T2</span>
                        <span class="col kpi-month">T3</span>
                        <span class="col kpi-month">T4</span>
                        <span class="col kpi-month">T5</span>
                        <span class="col kpi-month">T6</span>
                        <span class="col kpi-month">T7</span>
                        <span class="col kpi-month">T8</span>
                        <span class="col kpi-month">T9</span>
                        <span class="col kpi-month">T10</span>
                        <span class="col kpi-month">T11</span>
                        <span class="col kpi-month">T12</span>
                    </div>
                </div>
                <div class="row kpi-detail kpi-hover">
                    <div class="col-5 row">
                        <div class="col-10 title-kpi" title="Xây dựng form kpiXây dựng form kpiXây dựng form kpiXây dựng form kpiXây dựng form kpi">
                            Xây dựng form kpiXây dựng form kpiXây dựng form kpiXây dựng form kpiXây dựng form kpi<for></for></div>
                        <div class="col-2 text-center">
                            <i class="fa fa-square" style="color: green" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-1">% đạt</div>
                    <div class="col-6 row">
                        <span class="col kpi-month">90</span>
                        <span class="col kpi-month">100</span>
                        <span class="col kpi-month">105</span>
                        <span class="col kpi-month">20</span>
                        <span class="col kpi-month">50</span>
                        <span class="col kpi-month">70</span>
                        <span class="col kpi-month">20</span>
                        <span class="col kpi-month">60</span>
                        <span class="col kpi-month">100</span>
                        <span class="col kpi-month">110</span>
                        <span class="col kpi-month">100</span>
                        <span class="col kpi-month">100</span>
                    </div>
                </div>
                <div class="row kpi-detail kpi-hover">
                    <div class="col-5 row">
                        <div class="col-10 title-kpi">
                            Xây dựng form kpi</div>
                        <div class="col-2 text-center">
                            <i class="fa fa-square" style="color: red" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-1">% đạt</div>
                    <div class="col-6 row">
                        <span class="col kpi-month">90</span>
                        <span class="col kpi-month">100</span>
                        <span class="col kpi-month">-</span>
                        <span class="col kpi-month">20</span>
                        <span class="col kpi-month">-</span>
                        <span class="col kpi-month">-</span>
                        <span class="col kpi-month">20</span>
                        <span class="col kpi-month">60</span>
                        <span class="col kpi-month">-</span>
                        <span class="col kpi-month">-</span>
                        <span class="col kpi-month">100</span>
                        <span class="col kpi-month">-</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="col-12 box-kpi">
            <div class="kpi-header">
                <i class="fa fa-caret-right collapsed" aria-hidden="true" data-toggle="collapse" data-target="#demo"></i> Phát triển hệ thống - Mức độ quan trọng: <b>Bình
                    Thường</b>
            </div>
            <div id="demo" class="kpi-body collapse">

                <div class="row kpi-detail kpi-header-title">
                    <div class="col-5 text-bold row">
                        <div class="col-10">KPI</div>
                        <div class="col-2">Độ khó</div>
                    </div>
                    <div class="col-1 text-bold">Loại</div>
                    <div class="col-6 text-bold row">
                        <span class="col kpi-month">T1</span>
                        <span class="col kpi-month">T2</span>
                        <span class="col kpi-month">T3</span>
                        <span class="col kpi-month">T4</span>
                        <span class="col kpi-month">T5</span>
                        <span class="col kpi-month">T6</span>
                        <span class="col kpi-month">T7</span>
                        <span class="col kpi-month">T8</span>
                        <span class="col kpi-month">T9</span>
                        <span class="col kpi-month">T10</span>
                        <span class="col kpi-month">T11</span>
                        <span class="col kpi-month">T12</span>
                    </div>
                </div>
                <div class="row kpi-detail kpi-hover">
                    <div class="col-5 row">
                        <div class="col-10 title-kpi" title="Xây dựng form kpiXây dựng form kpiXây dựng form kpiXây dựng form kpiXây dựng form kpi">
                            Xây dựng form kpiXây dựng form kpiXây dựng form kpiXây dựng form kpiXây dựng form kpi<for></for></div>
                        <div class="col-2 text-center">
                            <i class="fa fa-square" style="color: green" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-1">% đạt</div>
                    <div class="col-6 row">
                        <span class="col kpi-month">90</span>
                        <span class="col kpi-month">100</span>
                        <span class="col kpi-month">105</span>
                        <span class="col kpi-month">20</span>
                        <span class="col kpi-month">50</span>
                        <span class="col kpi-month">70</span>
                        <span class="col kpi-month">20</span>
                        <span class="col kpi-month">60</span>
                        <span class="col kpi-month">100</span>
                        <span class="col kpi-month">110</span>
                        <span class="col kpi-month">100</span>
                        <span class="col kpi-month">100</span>
                    </div>
                </div>
                <div class="row kpi-detail kpi-hover">
                    <div class="col-5 row">
                        <div class="col-10 title-kpi">
                            Xây dựng form kpi</div>
                        <div class="col-2 text-center">
                            <i class="fa fa-square" style="color: red" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-1">% đạt</div>
                    <div class="col-6 row">
                        <span class="col kpi-month">90</span>
                        <span class="col kpi-month">100</span>
                        <span class="col kpi-month">-</span>
                        <span class="col kpi-month">20</span>
                        <span class="col kpi-month">-</span>
                        <span class="col kpi-month">-</span>
                        <span class="col kpi-month">20</span>
                        <span class="col kpi-month">60</span>
                        <span class="col kpi-month">-</span>
                        <span class="col kpi-month">-</span>
                        <span class="col kpi-month">100</span>
                        <span class="col kpi-month">-</span>
                    </div>
                </div>
            </div>
        </div>
    </div>`;
    $('#kpi').html(html)
    $('.collapsed').on('click',function (){
        $(this).toggleClass('fa-caret-right fa-caret-down')
    })
}
