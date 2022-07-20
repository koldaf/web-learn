@extends('layouts.main-layout')
@section('content')
<div class="pagetitle">
    <h1>Transformers</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Transformers</li>
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
                                <h5 class="card-title">Transformer</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Reading mode </h6>
                                <p><strong>Introduction</strong></p>
                                <p>Good day everyone. You are welcome to the first unit of this module where I will introduce you to the concept of transformer. In this unit, you will be introduced to the definition, purpose, types, and characteristics of the transformer. You will also be exposed to the principle of mutual induction.</p>
                                <p>At the end of the lesson, you should be able to:</p>
                                <ol>
                                <li>define transformer</li>
                                <li>state the purpose of transformer</li>
                                <li>explain the principles of mutual induction</li>
                                <li>identify the common types of transformer from their schematic diagram</li>
                                <li>state and explain some of characteristics of transformer</li>
                                </ol>
                                <p><strong>Definition of Transformer </strong></p>
                                <p>Now, what is transformer? A transformer is defined as a passive electrical device that transfers electrical energy from one circuit to another through the process of electromagnetic induction. It is most commonly used to increase (&lsquo;step up&rsquo;) or decrease (&lsquo;step down&rsquo;) voltage levels between circuits.</p>
                                <p>To be simply put, a transformer is an electrical device designed and manufactured to step voltage up or step down. Electrical transformers operate on the principle of magnetic induction and have no moving parts.</p>
                                <p>As a transformer transforms the voltage on the input side to the voltage required by the device or equipment connected to the output, it inversely increases or decreases the current flow between the different voltage levels. An electrical transformer exemplifies the law of conservation of energy that says energy can neither be created nor destroyed, only transformed!</p>
                                <p><strong>Purpose of Transformer</strong></p>
                                <p>Let us look at the purpose of transformer. Transformers are employed for widely varying purposes. But basically, the purposes of transformer are two. It is most commonly used to increase or decrease voltage levels between circuits.</p>
                                <p><strong>Principles of Mutual Induction</strong></p>
                                <p>As we proceed in this lesson, I will like to explain to you the meaning of principles of mutual induction. If two coil of conducting wire are kept into close proximity with each other then the magnetic flux of one coil is link&nbsp;with the other coil. As a result of generated Electro Motive Force (EMF)&nbsp;in other coil that phenomenon is known as the mutual inductance.</p>
                                <p>Now, look at the diagram on the screen in order for you to understand this concept.</p>
                                <p>Mutual-induction</p>
                                <p>From the diagram on the screen, you will&nbsp;see that two coils are placed together. When current is passed through the primary coil, magnetic flux is produced. This magnetic flux is link with the secondary coil. If the current is change by varying the resistance in the primary circuit using tapping, the magnetic flux also change. As this changing flux is linked with the secondary coil, that changing flux induces an EMF in secondary coil. This phenomenon of inducing EMF&nbsp;in a coil by changing current in another coil is known as <strong>mutual induction</strong>.</p>
                                <p><strong>Types of Transformers</strong></p>
                                <p>There are several transformer types used in the electrical power system for different purposes. For the purpose of this lesson, we will be considering the <strong>most commonly used transformer types</strong> for all the applications.</p>
                                <ol>
                                <li><strong>Step-Up Transformer</strong>

                                <p>As the name states, the secondary voltage is stepped up with a ratio compared to the primary voltage. This can be achieved by increasing the number of windings in the secondary than the primary windings as shown in the diagram on the screen. In a power plant, a&nbsp;<a href="https://www.elprocus.com/what-is-a-step-up-transformer-working-its-applications/">step-up transformer</a>&nbsp;is used as a connecting transformer of the generator to the grid.</p>
                                <div style="text-align: center">
                                    <img src="{{ asset('assets/img/stepUpTransformer.jpg') }}" alt="Step Up Transformer"/>
                                    <p style="text-align: center">Step-up Transformer</p>
                                </div>
                            </li>
                                <li><strong>Step-Down Transformer</strong>
                                <p>It used to step down the voltage level from higher to lower level at the secondary side, so that it is called a<a href="https://www.elprocus.com/steps-to-convert-the-230v-ac-to-5v-dc/">&nbsp;step-down transformer</a>. The winding turns more on the primary side than the secondary side.</p>

                        <div style="text-align: center">
                                    <img src="{{ asset('assets/img/stepDownTransformer.jpg') }}" alt="Step Down Transformer"/>
                                    <p style="text-align: center">Step-down Transformer</p>
                                </div>
                            </li>
                        </li>
                                <p>In distribution networks, the step-down transformer is commonly used to convert the high grid voltage to low voltage that can be used for home appliances.</p>
                                <p><strong>Characteristics of Transformer</strong></p>
                                <p>Some of the characteristics of a transformer are:</p>
                                <ul>
                                <li>
                                    <strong>Variable Voltage</strong>
                                    <p>The input and output voltages of a transformer are variable. This means a transformer can increase or decrease the supply voltage.</p>
                                </li>
                                <li>
                                    <strong>Variable Current</strong>
                                    <p>The current is also a variable quantity in a transformer which can be increased or decreased.</p>
                                </li>
                                <li><strong>Constant Frequency</strong>
                                    <p>A transformer is a constant frequency operating device. The frequency of the input voltage &amp; the output voltage remains the same.</p>
                                </li>
                                <li><strong>Constant Power</strong>
                                <p>The power of the transformer remains constant. The power that is supplied to the transformer &amp; the power delivered by the transformer remains the same.</p>
                                </li>
                            </ul>
                                <p><strong>Summary</strong></p>
                                <p>With this, we have come to the end of this unit. Completing this unit has helped you to define transformer as an electrical device designed and manufactured to step voltage up or down. You have also learnt the common types of transformer and their uses. In addition, you are now familiar with the principle of mutual induction.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

  </section>
@endsection
