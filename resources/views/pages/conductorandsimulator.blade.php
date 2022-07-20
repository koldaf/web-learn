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
                                <p><strong>Introduction to Conductors and insulators</strong></p>
                                <p>Have you ever wondered why you sometimes experience electric shock while opening your gate during the harmattan season? But when you take your book to read you don't feel any shock. It is because your book is an insulator while the gate is made of metal which is a conductor.</p>
                                <p><strong>Learning Outcomes</strong></p>
                                <p>By the end of this video, you should be able to:</p>
                                <ol>
                                <li>Define a Conductor and an Insulator</li>
                                <li>state at least 3 Applications of conductors and insulators.</li>
                                <li>Mention at least 5 differences between conductors and insulators</li>
                                </ol>
                                <p><strong>What then are conductors?</strong></p>
                                <p>Conductors are defined as the materials or substances that allow electricity to flow through them. Also, conductors allow heat to be transmitted through them.</p>
                                <p>Examples of conductors are metals, the human body, Earth and animals. The human body is a strong conductor. It, therefore, offers a resistance-free route from a current-carrying wire through the body for the current to flow. Conductors have free electrons on their surface that allow the easy passage of current. This is the reason why electricity and heat transmit freely through the conductors.&nbsp;</p>
                                <p><strong>&nbsp;What are Insulators?</strong></p>
                                <p>Insulators, on the other hand, are substances that have exactly the opposite effect on the flow of electrons. These substances impede the free flow of electrons, thereby inhibiting the flow of electrical current. Insulators contain atoms that hold on to their electrons tightly which restricts the flow of electrons from one atom to another. Because of the tightly bound electrons, they are not able to roam around freely.</p>
                                <p>Examples of insulators include: Glass which is the strongest insulator as it has the highest resistivity, another example is Plastic which is a good insulator as it is used to manufacture a variety of products, rubber is a common material used in the manufacture of tyres, fire-resistant clothing, and slippers. Other examples are paper, Styrofoam and dry air.</p>
                                <p><strong>Applications of Conductors</strong></p>
                                <p>In certain aspects, conductors are very useful. They have many real-life applications. For example, conductors are used to</p>
                                <ol>
                                <li>Check the temperature of a body, mercury is a common material in the thermometer.&nbsp;</li>
                                <li>Conductors like Aluminum are used to manufacture foils for food preservation. It is also used in cooking vessels as it is a good conductor of electricity and heat.</li>
                                <li>Iron is a common material used to conduct heat in vehicle engine manufacturing. The iron plate is composed of steel to briskly absorb heat.</li>
                                <li>In the car radiators, conductors find their use in the eradication of heat away from the engine.</li>
                                </ol>
                                <p><strong>Applications of Insulators</strong></p>
                                <p>As insulators resist the flow of electron, they find worldwide applications. Some of the common uses include:</p>
                                <ol>
                                <li>Thermal insulators, disallow heat to move from one place to another. Hence, we use them in making thermoplastic bottles. They are also used in fireproofing ceilings and walls.</li>
                                <li>Sound insulators help in controlling noise level, as they are good in absorbance of sound. Thus, we use them in buildings and conference halls to make them noise-free.</li>
                                <li>Electrical insulators hinder the flow of electron or passage of current through them. So, we use them extensively in circuit boards and high-voltage systems. They are also used in coating electric wire and cables.</li>
                                </ol>
                                <p><strong>What are the Differences between conductor and insulator?</strong></p>
                                <p>1.Conductors anticipate free flow of electric current because electrons roam freely from one atom to another with ease. Insulators, on the other hand, oppose electric current because they won&rsquo;t permit free flow of electrons from one particle to another.</p>
                                <ol start="2">
                                <li>Conductors can easily transfer energy in the form of electricity or heat, for that matter. However, insulators cannot transfer electrical energy so easily so they resist electricity.</li>
                                <li>Conductors can easily pass electricity through them because of the free electrons present in their atomic structure, but insulators, on the other hand, cannot pass electricity through them.</li>
                                <li>Conductors are substances whose atoms do not have tightly bound electrons thus they are free to roam around in one or many directions. However, electrons are tightly bound within atoms in case of insulators thereby restricting any movement of electrons within the nominal range of applied voltage.</li>
                                <li>Conductors usually have a low resistance, but not zero resistance unless they are super conductors. Insulators have a high resistance to electricity.</li>
                                <li>Conductors conduct electricity while insulators insulate electricity. For example, the metallic wire in an electric cord is a conductor, while the sheath or the protective cover is the insulator.</li>
                                </ol>
                                <p><strong>Note!</strong></p>
                                <p>Touching a live conductor might kill you. On the other hand, if you touch a live insulator, it won&rsquo;t even hurt a bit because it resists electric current.</p>
                                <p><strong>Summary </strong></p>
                                <p>Both conductors and insulators are practically opposite in terms of property and functionality. The most common difference between the two is that while conductors allow free flow of electrons from one atom to another, insulators restrict free flow of electrons. Conductors allow electrical energy to pass through them, whereas insulators do not allow electrical energy to pass through them. Conductors have high conductivity whereas insulators have low conductivity.</p>
                                <p>With these we have come to the end of the lesson and by now I expect you to know the meaning of conductor and insulator, examples, Applications and differences between a conductor and an insulator.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

  </section>
@endsection
