<?php

namespace Psr\Http;

/**
 * HTTP messages consist of requests from a client to a server and responses
 * from a server to a client.
 */
interface MessageInterface
{
    /**
     * Gets the HTTP protocol version.
     *
     * @return string HTTP protocol version.
     */
    public function getProtocolVersion();

    /**
     * Gets the body of the message.
     *
     * @return StreamInterface|null Returns the body, or null if not set.
     */
    public function getBody();

    /**
     * Sets the body of the message.
     *
     * The body MUST be a StreamInterface object. Setting the body to null MUST
     * remove the existing body.
     *
     * @param StreamInterface|null $body Body.
     *
     * @return self Returns the message.
     *
     * @throws \InvalidArgumentException When the body is not valid.
     */
    public function setBody(StreamInterface $body = null);

    /**
     * Get all headers or all of a specific name
     *
     * Each header is represented as a HeaderFieldInterface.
     *
     * The keys in the returned Traversable are such header-fields field-name and accordingly the
     * values the field-value of that header-field.
     *
     *     // Represent headers as a string
     *     $headers = '';
     *     foreach ($message->getHeaders() as $name => $value) {
     *         $headers .= "$name: $value\r\n";
     *     }
     *
     * @param string $name (optional) providing a name returns header fields by that name
     * @return HeadersInterface the message's header fields
     */
    public function getHeaders($name = NULL);

    /**
     * Set all headers
     *
     * @param HeadersInterface $headers
     */
    public function setHeaders(HeadersInterface $headers);
}
