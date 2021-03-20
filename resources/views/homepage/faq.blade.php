@extends('homepage.layouts.app')

@section('title')
FAQ | EKRAF Jambi
@endsection

@section('content')
<div class="container mt-7 mb-2">
  <div class="mb-5">
    <div class="d-flex flex-wrap flex-md-nowrap justify-content-between">
      <h3 class="widget-title text-nowrap">FAQ</h3>
    </div>

    <div class="accordion" id="faq">
      @foreach ($faq as $faq)
        <div class="accordion-item shadow">
              <h2 class="accordion-header" id="faq-heading-{{ $faq->urutan }}">
                <button class="accordion-button @if($faq->urutan != '1') collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{ $faq->urutan }}" aria-expanded="{{ $faq->urutan === '1' ? 'true' : 'false' }}" aria-controls="faq-content-{{ $faq->urutan }}">
                  {{ $faq->pertanyaan }}
                </button>
              </h2>
              <div class="accordion-collapse collapse @if($faq->urutan == '1') show @endif" id="faq-content-{{ $faq->urutan }}" aria-labelledby="faq-heading-{{ $faq->urutan }}" data-bs-parent="#faq">
                <div class="accordion-body">
                  <div class="fs-sm">
                    {!! $faq->jawaban !!}
                  </div>
                </div>
              </div>
          </div>
      @endforeach
      </div>
  </div>
</div>
@stop