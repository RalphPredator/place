<x-mail::message>
# 🚨 Exception Occured

**Message**  
`{{ $exception->getMessage() }}`

**Fichier**  
`{{ $exception->getFile() }} : {{ $exception->getLine() }}`

---

## Trace

```text
{{ $exception->getTraceAsString() }}
</x-mail::message>
