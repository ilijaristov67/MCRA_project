@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center text-primary">All Events</h2>
    <div class="row" id="eventsContainer">

    </div>
</div>

<!-- Modal for displaying event details -->
<div class="modal fade" id="eventDetailsModal" tabindex="-1" aria-labelledby="eventDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="eventDetailsModalLabel">Event Details</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="eventDetailsContent" style="background-color: #f8f9fa;">
                <!-- Event details will be dynamically loaded here -->
            </div>
            <div class="modal-footer" style="background-color: #f1f1f1;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            url: `${window.location.origin}/api/getEvents`,
            type: 'get',
            success: function(response) {
                const eventsData = response.data;
                let eventCards = '';

                eventsData.forEach(event => {
                    let speakersList = '';
                    event.speakers.forEach(speaker => {
                        speakersList += `
                        <li>
                            ${speaker.name} ${speaker.last_name} - 
                            <a href="${speaker.social_media}" target="_blank" class="text-info">Social Media</a>
                        </li>`;
                    });

                    // Trim the description to 100 characters
                    let trimmedDescription = event.description.length > 100 ?
                        event.description.substring(0, 100) + '...' :
                        event.description;

                    eventCards += `
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm" style="border-radius: 15px; background-color: #fdfdfd;">
                            <div class="card-body">
                                <h4 class="card-title text-primary">${event.title}</h4>
                                <h6 class="card-subtitle mb-2 text-muted">${event.theme}</h6>
                                <p class="card-text">${trimmedDescription}</p> <!-- Shortened description -->
                                <p><strong>Location:</strong> ${event.location}</p>
                                <p><strong>Objectives:</strong> ${event.objectives}</p>
                                <p><strong>Date:</strong> ${event.date} (${event.day})</p>
                                <p><strong>Ticket Price:</strong> $${event.ticket_price}</p>
                                
                                <h5 class="text-primary">Speakers:</h5>
                                <ul>${speakersList}</ul>
                                
                                <button class="btn btn-outline-primary view-details-btn" data-event-id="${event.id}">See Event Details</button>
                            </div>
                        </div>
                    </div>`;
                });

                $('#eventsContainer').html(eventCards);

                $('.view-details-btn').on('click', function() {
                    const eventId = $(this).data('event-id');
                    $.ajax({
                        url: `/api/getEvent/${eventId}`,
                        type: 'get',
                        success: function(response) {
                            const event = response.data;

                            let agendaList = '';
                            if (event.eventAgendas && event.eventAgendas.length > 0) {
                                agendaList = `<h4 class="mt-4 text-primary">Agenda:</h4>`;
                                event.eventAgendas.forEach((agenda, index) => {
                                    agendaList += `
                                        <div class="mb-2">
                                            <strong>${agenda.time}</strong> - <strong>${agenda.title}</strong><br>
                                            ${agenda.content}
                                        </div>`;
                                });
                            }

                            let speakersList = '';
                            event.speakers.forEach(speaker => {
                                speakersList += `<li>${speaker.name} ${speaker.last_name} - <a href="${speaker.social_media}" target="_blank" class="text-info">Social Media</a></li>`;
                            });

                            $('#eventDetailsContent').html(`
                                <h2 class="mb-3 text-primary">${event.title}</h2>
                                <h6 class="text-muted mb-4">${event.theme}</h6>
                                <p><strong>Description:</strong> ${event.description}</p>
                                <p><strong>Location:</strong> ${event.location}</p>
                                <p><strong>Date:</strong> ${event.date} (${event.day})</p>
                                <p><strong>Ticket Price:</strong> $${event.ticket_price}</p>
                                <h5 class="text-primary">Speakers:</h5>
                                <ul>${speakersList}</ul>
                                ${agendaList}
                            `);
                            $('#eventDetailsModal').modal('show');
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                });
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
</script>

@endsection