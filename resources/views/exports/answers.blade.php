                <table class="table">
                    <thead >
                    <tr>
                        @foreach($keys as $k)
                            <th class="thead-dark">{{ $k }}</th>
                        @endforeach
                    </tr>
                    
                    </thead>
                    <tbody class="px-12">
                        @foreach($section->questionAnswers as  $answer)
                            <tr>
                            @php $answers = json_decode($answer->value); @endphp
                            @foreach($keys as $key)
                                <td class="border px-12 py-2">
                                    {{ $answers->{$key} }}
                                </td>
                            @endforeach
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>