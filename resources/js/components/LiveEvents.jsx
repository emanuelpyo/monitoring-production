function LiveEvents({ events }) {
    return (
        <section className="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
            <div className="mb-4 flex items-center justify-between">
                <h2 className="text-lg font-semibold text-gray-900">
                    Live Production Events
                </h2>

                <span className="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">
                    Latest 20
                </span>
            </div>

            {events.length === 0 ? (
                <p className="text-sm text-gray-500">
                    No production events yet.
                </p>
            ) : (
                <div className="divide-y divide-gray-100">
                    {events.map((event) => (
                        <div
                            key={event.id}
                            className="flex items-center justify-between gap-4 py-4"
                        >
                            <div>
                                <p className="font-medium text-gray-900">
                                    {event.line.code} — {event.product.name}
                                </p>

                                <p className="mt-1 text-xs text-gray-500">
                                    {event.event_at}
                                </p>

                                {event.reject_reason && (
                                    <p className="mt-1 text-xs text-red-600">
                                        {event.reject_reason.name}
                                    </p>
                                )}
                            </div>

                            <span
                                className={`rounded-full px-3 py-1 text-xs font-semibold ${
                                    event.status === 'OK'
                                        ? 'bg-green-100 text-green-700'
                                        : 'bg-red-100 text-red-700'
                                }`}
                            >
                                {event.status}
                            </span>
                        </div>
                    ))}
                </div>
            )}
        </section>
    );
}

export default LiveEvents;