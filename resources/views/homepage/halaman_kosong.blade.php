@extends('homepage.layouts.app')

@section('title')
Akun saya | EKRAF Jambi
@endsection

@section('content')

<div class="container d-flex flex-column justify-content-center pt-7 mt-n6" style="flex: 1 0 auto;">
    <div class="pt-7 pb-4">
      <div class="text-center mb-2 pb-4">
        <h1 class="mb-5">
        	<img class="d-inline-block" alt="Error 404" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iNDUzcHgiIGhlaWdodD0iMTY4cHgiIHZpZXdCb3g9IjAgMCA0NTMgMTY4IiB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPgogICAgPCEtLSBHZW5lcmF0b3I6IFNrZXRjaCA1MyAoNzI1MjApIC0gaHR0cHM6Ly9za2V0Y2hhcHAuY29tIC0tPgogICAgPHRpdGxlPjQwNDwvdGl0bGU+CiAgICA8ZGVzYz5DcmVhdGVkIHdpdGggU2tldGNoLjwvZGVzYz4KICAgIDxnIGlkPSJTcGVjaWFsdHktUGFnZXMiIHN0cm9rZT0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIxIiBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPgogICAgICAgIDxnIGlkPSI0MDQtRXJyb3ItLS1TaW1wbGUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC03MzQuMDAwMDAwLCAtMzYzLjAwMDAwMCkiIGZpbGw9IiNFOUU5RjIiIGZpbGwtcnVsZT0ibm9uemVybyI+CiAgICAgICAgICAgIDxnIGlkPSJDb250ZW50IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg3MjUuMDAwMDAwLCAzMTQuMDAwMDAwKSI+CiAgICAgICAgICAgICAgICA8cGF0aCBkPSJNOS4wNjI0OTEzNiwxODcuMDAwMDI0IEw5LjA2MjQ5MTM2LDE1My4yNTAwNTYgTDczLjQzNzQzLDUyLjAwMDE1MjYgTDEyOC40MzczNzgsNTIuMDAwMTUyNiBMMTI4LjQzNzM3OCwxNTMuMjUwMDU2IEwxNDYuODc0ODYsMTUzLjI1MDA1NiBMMTQ2Ljg3NDg2LDE4Ny4wMDAwMjQgTDEyOC40MzczNzgsMTg3LjAwMDAyNCBMMTI4LjQzNzM3OCwyMTIgTDg2Ljg3NDkxNzEsMjEyIEw4Ni44NzQ5MTcxLDE4Ny4wMDAwMjQgTDkuMDYyNDkxMzYsMTg3LjAwMDAyNCBaIE04Ny44MTI0MTYzLDE1My4yNTAwNTYgTDg3LjgxMjQxNjMsOTcuMDAwMTA5NyBMODYuNTYyNDE3NCw5Ny4wMDAxMDk3IEw1MS44NzQ5NTA1LDE1Mi4wMDAwNTcgTDUxLjg3NDk1MDUsMTUzLjI1MDA1NiBMODcuODEyNDE2MywxNTMuMjUwMDU2IFogTTIzNC42ODc0MjMsMjE2LjM3NDk5NiBDMTkxLjA5MzcxNSwyMTYuMjk2ODcxIDE2My45MDYyNDEsMTg1LjA0NjkwMSAxNjQuMDYyNDkxLDEzMi4zMTI1NzYgQzE2NC4yMTg3NDEsNzkuNTAwMTI2NCAxOTEuMDkzNzE1LDQ5LjgxMjY1NDcgMjM0LjY4NzQyMyw0OS44MTI2NTQ3IEMyNzguMjAzMDA3LDQ5LjgxMjY1NDcgMzA1LjM5MDQ4MSw3OS42NTYzNzYyIDMwNS4zMTIzNTYsMTMyLjMxMjU3NiBDMzA1LjIzNDIzMSwxODUuMjgxMjc1IDI3OC4yMDMwMDcsMjE2LjQ1MzEyMSAyMzQuNjg3NDIzLDIxNi4zNzQ5OTYgWiBNMjM0LjY4NzQyMywxODEuMDYyNTMgQzI0OS42ODc0MDksMTgxLjA2MjUzIDI2MC4zOTA1MjQsMTY1Ljk4NDQxOSAyNjAuMzEyMzk5LDEzMi4zMTI1NzYgQzI2MC4yMzQyNzQsOTkuNDIxOTgyNCAyNDkuNjg3NDA5LDg0LjgxMjYyMTMgMjM0LjY4NzQyMyw4NC44MTI2MjEzIEMyMTkuNjg3NDM4LDg0LjgxMjYyMTMgMjA5LjIxODY5OCw5OS40MjE5ODI0IDIwOS4wNjI0NDgsMTMyLjMxMjU3NiBDMjA4LjkwNjE5OCwxNjUuOTg0NDE5IDIxOS42ODc0MzgsMTgxLjA2MjUzIDIzNC42ODc0MjMsMTgxLjA2MjUzIFogTTMyNC4wNjI0OTEsMTg3LjAwMDAyNCBMMzI0LjA2MjQ5MSwxNTMuMjUwMDU2IEwzODguNDM3NDMsNTIuMDAwMTUyNiBMNDQzLjQzNzM3OCw1Mi4wMDAxNTI2IEw0NDMuNDM3Mzc4LDE1My4yNTAwNTYgTDQ2MS44NzQ4NiwxNTMuMjUwMDU2IEw0NjEuODc0ODYsMTg3LjAwMDAyNCBMNDQzLjQzNzM3OCwxODcuMDAwMDI0IEw0NDMuNDM3Mzc4LDIxMiBMNDAxLjg3NDkxNywyMTIgTDQwMS44NzQ5MTcsMTg3LjAwMDAyNCBMMzI0LjA2MjQ5MSwxODcuMDAwMDI0IFogTTQwMi44MTI0MTYsMTUzLjI1MDA1NiBMNDAyLjgxMjQxNiw5Ny4wMDAxMDk3IEw0MDEuNTYyNDE3LDk3LjAwMDEwOTcgTDM2Ni44NzQ5NTEsMTUyLjAwMDA1NyBMMzY2Ljg3NDk1MSwxNTMuMjUwMDU2IEw0MDIuODEyNDE2LDE1My4yNTAwNTYgWiIgaWQ9IjQwNCI+PC9wYXRoPgogICAgICAgICAgICA8L2c+CiAgICAgICAgPC9nPgogICAgPC9nPgo8L3N2Zz4=">
        	<span class="visually-hidden">Error 404</span>
        </h1>
        <h2>Halaman tidak ditemukan</h2>
        <p class="pb-2">Halaman ini belum tersedia untuk saat ini. Mohon cek lagi nanti.</p><a class="btn btn-translucent-primary me-3" href="/">Kembali ke halaman utama</a>
      </div>
    </div>
  </div>

@stop