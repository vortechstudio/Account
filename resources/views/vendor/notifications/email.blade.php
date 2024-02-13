<style>html,body { padding: 0; margin:0; }</style>
<div style="font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#edf2f7">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px">
        <tbody>
        <tr>
            <td align="center" valign="center" style="text-align:center; padding: 40px">
                <a href="{{ config('app.url') }}" rel="noopener" target="_blank">
                    <img alt="Logo" src="{{ asset('/storage/logos/logo.png') }}" />
                </a>
            </td>
        </tr>
        <tr>
            <td align="left" valign="center">
                <div style="text-align:left; margin: 0 20px; padding: 40px; background-color:#ffffff; border-radius: 6px">
                    <!--begin:Email content-->
                    <div style="padding-bottom: 30px; font-size: 17px;">
                        <strong>
                            @if (! empty($greeting))
                                # {{ $greeting }}
                            @else
                                @if ($level === 'error')
                                    # @lang('Whoops!')
                                @else
                                    # @lang('Hello!')
                                @endif
                            @endif
                        </strong>
                    </div>
                    <div style="margin-bottom: 9px; color: #181C32; font-size: 22px; font-weight: 700;">
                        @foreach ($introLines as $line)
                            {{ $line }}
                        @endforeach
                    </div>
                    <div style="padding-bottom: 20px">
                        {{-- Action Button --}}
                        @isset($actionText)
                                <?php
                                $color = match ($level) {
                                    'success', 'error' => $level,
                                    default => 'primary',
                                };
                                ?>
                            <x-mail::button :url="$actionUrl" :color="$color">
                                {{ $actionText }}
                            </x-mail::button>
                        @endisset
                    </div>
                    <div style="padding-bottom: 40px">
                        @foreach ($outroLines as $line)
                            {{ $line }}
                        @endforeach
                    </div>
                    <!--end:Email content-->
                    <div style="padding-bottom: 10px">
                        {{-- Salutation --}}
                        @if (! empty($salutation))
                            {{ $salutation }}
                        @else
                            @lang('Regards'),<br>
                            {{ config('app.name') }}
                        @endif
                    </div>
                    {{-- Subcopy --}}
                    @isset($actionText)
                        <x-slot:subcopy>
                            @lang(
                                "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
                                'into your web browser:',
                                [
                                    'actionText' => $actionText,
                                ]
                            ) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
                        </x-slot:subcopy>
                    @endisset
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>
