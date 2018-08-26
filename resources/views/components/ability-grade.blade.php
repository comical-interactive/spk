<td class="svg">
    @if ($ability->grade() == 'SK')
      <img src="{{ asset('check-mark.svg') }}">
    @endif
  </td>

  <td class="svg">
    @if ($ability->grade() == 'K')
      <img src="{{ asset('check-mark.svg') }}">
    @endif
  </td>

  <td class="svg">
    @if ($ability->grade() == 'S')
      <img src="{{ asset('check-mark.svg') }}">
    @endif
  </td>

  <td class="svg">
    @if ($ability->grade() == 'B')
      <img src="{{ asset('check-mark.svg') }}">
    @endif
  </td>

  <td class="svg">
    @if ($ability->grade() == 'SB')
      <img src="{{ asset('check-mark.svg') }}">
    @endif
  </td>
