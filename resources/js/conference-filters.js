function toggleConferenceList() {
    const type = document.getElementById('conferenceType').value;
    document.getElementById('upcoming-list').style.display = type === 'upcoming' ? '' : 'none';
    document.getElementById('past-list').style.display = type === 'past' ? '' : 'none';
}
window.toggleConferenceList = toggleConferenceList;
