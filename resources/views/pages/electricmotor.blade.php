@extends('layouts.main-layout')
@section('content')
<div class="pagetitle">

    <h1>{{ $topic->topic }}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">{{ $topic->topic }}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
        <div class="d-flex align-items-start">
            <div class="col-2">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"> <i class="bi bi-file-play-fill"></i>Watch Video</button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"> <i class="bi bi-card-text"></i> Read Text</button>
                </div>
            </div>
            <div class="col-10">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $topic->topic }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted disabled"><i class="bi bi-camera-reels-fill"></i> {{ $topic->length }} | <i class="bi bi-water"></i> {{ $topic->difficulty }}</h6>
                                <script src="https://h5p.org/sites/all/modules/h5p/library/js/h5p-resizer.js" charset="UTF-8"></script><iframe src="https://h5p.org/h5p/embed/1283690" width="1000" height="550" frameborder="0" allowfullscreen="allowfullscreen" allow="geolocation *; microphone *; camera *; midi *; encrypted-media *" title="Transformers"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $topic->topic }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Reading mode </h6>
                                <p><strong>Introduction</strong></p>
                                <p>An electric motor is an electrical machine that converts electrical energy into mechanical energy. Most electric motors operate through the interaction between the motor's magnetic field and electric current in a wire winding to generate force in the form of torque applied on the motor's shaft.</p>
                                <p><strong>Learning Outcomes</strong></p>
                                <p>At the end of this lesson you should be able to:</p>
                                <ol>
                                <li>state the purpose of electric motor</li>
                                <li>explain the principle of operation of electric motor</li>
                                <li>list the types of electric motor</li>
                                <li>differentiate between AC and DC Motor</li>
                                </ol>
                                <p><strong>What is an electric motor?</strong></p>
                                <p>Electric motor is an electrical machine that converts electrical energy into mechanical energy. An electric generator is mechanically identical to an electric motor, but operates with a reversed flow of power, converting mechanical energy into electrical energy.</p>
                                <p>Electric motors can be powered by direct current (DC) sources, such as from batteries, or rectifiers, or by alternating current (AC) sources, such as a power grid, inverters or electrical generators.</p>
                                <p><strong>Purpose of electric motor</strong></p>
                                <p>Now let us talk about the purpose of electric motor. The main purpose of an electric motor is that it converts electrical energy into mechanical energy.</p>
                                <p>Electric motors are used in a variety of applications such as in Drilling Machines , Water Pumps , Fans , Hair Dryer , Hard Disc Drives , Washing Machines , Refrigerators , Mixers and blenders as well as in Industrial Equipments. Let&rsquo;s go through an instance: What does the mixer in your house do for you? The rotating blades mash and mix things for you. And if someone were to ask you how that works, what would you say? You would probably say that it works on electricity. Well, that&rsquo;s not incorrect. Motors convert electric energy to mechanical work. The opposite is done by generators that convert mechanical work to electrical energy</p>
                                <p><strong>Principle of Operation of Electric Motor</strong></p>
                                <p>We now move to the principle of operation of electric motor. Most electric motors operate on the basis of interaction between the motor's magnetic field and electric current in a wire winding, which is the underlying principle, to generate force in the form of torque applied on the shaft of the motor.</p>
                                <p>The diagram showing on the screen will give you better understanding of the principle of how electronic motor works.</p>
                                <p><strong>Types of Electric Motor</strong></p>
                                <p>Let us now examine the types of electric motor. Electric motors are divided into three types, one is an AC motor, the other is a DC motor and the third is a Special Type motor.</p>
                                <p>What is AC Motor?</p>
                                <p>An AC motor is a kind of electric motor that uses an electromagnetic induction phenomenon. An alternating current drives this electric motor. It is a type of electric current that periodically reverses direction and changes its magnitude continuously with time.</p>
                                <p>Most of the appliances, equipment, and tools we use daily are powered by an AC motor. Anything that can be plugged in is likely to be the kind that is powered by an AC motor. This is why AC motors can be called the heart of many machines we use every day. It is the power source for various applications due to its flexibility, efficiency, and quiet operation.</p>
                                <p>What DC motor?</p>
                                <p>A DC motor is defined as a class of electrical motors that convert direct current electrical energy into mechanical energy. From the definition, we can conclude that any electric motor that is operated using direct current is called a DC motor.</p>
                                <p>DC motors have a wide range of applications ranging from electric shavers to automobiles.</p>
                                <p>Special Motors</p>
                                <p>There are several types of special electric motors that are the modified versions of other motor designed for special purposes. Some of these electric motors are:</p>
                                <ol>
                                <li>Servo Motors</li>
                                <li>Direct Drive</li>
                                <li>Linear Motors etc.</li>
                                </ol>
                                <p><strong>Differences Between AC and DC Motor</strong>.</p>
                                <p>For the purpose of this lesson, we will look into the differences between AC and DC motor. While both A.C. and D.C. motors serve the same function of converting electrical energy into mechanical energy, they are powered, constructed and controlled differently. The most basic difference is the power source. A.C. motors are powered from alternating current (A.C.) while D.C. motors are powered from direct current (D.C.), such as batteries, D.C. power supplies or an AC-to-DC power converter. Also, AC motors are known for their increased power output and efficiency, while DC motors are prized for their speed control and output range. Lastly, AC motors are available in single or three-phase configurations, while DC motors are always single-phase.</p>
                                <p><strong>Summary</strong></p>
                                <p>In this lesson we talked about electric motor which is an electrical machine that converts electrical energy into mechanical energy. Its main purpose lies in its ability to convert electrical energy into mechanical energy and it operate on the principle of magnetic effect of current. There are three (3) main types of electric motor which are AC, DC and special type motor. Main difference between AC and DC motor is their power source. Ac is powered by alternating current while the DC is powered by direct current.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

  </section>
@endsection
